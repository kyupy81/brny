<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheftReport;
use Illuminate\Http\Request;

class TheftController extends Controller
{
    public function index()
    {
        $reports = TheftReport::with(['vehicle', 'reporter'])
            ->orderByRaw("CASE WHEN status = 'PENDING' THEN 1 ELSE 2 END")
            ->latest()
            ->paginate(20);

        return view('admin.thefts.index', compact('reports'));
    }

    public function show(TheftReport $theft)
    {
        $theft->load(['vehicle.owner', 'reporter']);
        return view('admin.thefts.show', compact('theft'));
    }

    public function update(Request $request, TheftReport $theft)
    {
        $request->validate([
            'status' => 'required|in:CONFIRMED,REJECTED,RECOVERED',
            'admin_note' => 'nullable|string'
        ]);

        $theft->update([
            'status' => $request->status,
            // 'admin_note' => $request->admin_note // Add column if needed
        ]);

        // If confirmed, update vehicle status?
        // Ideally, Vehicle model should have a status too, or we rely on TheftReport existence.
        // But for performance, updating Vehicle status is better.
        
        /*
        if ($request->status === 'CONFIRMED') {
            $theft->vehicle->update(['status' => 'STOLEN']);
        } elseif ($request->status === 'RECOVERED') {
            $theft->vehicle->update(['status' => 'REGISTERED']); // Or RECOVERED
        }
        */

        return redirect()->route('admin.thefts.index')
            ->with('success', 'Statut du signalement mis à jour.');
    }
}