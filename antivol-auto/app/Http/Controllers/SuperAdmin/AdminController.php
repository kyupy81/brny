<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\StoreAdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function create()
    {
        return view('super_admin.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => 'admin',
        ]);

        $user->assignRole('admin');

        Log::info('CREATE_ADMIN', ['admin_id' => auth()->id(), 'created_user_id' => $user->id]);

        return redirect()->route('super_admin.dashboard')->with('success', 'Admin créé avec succès.');
    }
}
