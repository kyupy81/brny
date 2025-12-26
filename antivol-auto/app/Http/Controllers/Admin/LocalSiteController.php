<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;

class LocalSiteController extends Controller
{
    public function show()
    {
        return view('admin.local_site', [
            'basePath' => base_path(),
            'publicPath' => public_path(),
            'isWindows' => PHP_OS_FAMILY === 'Windows',
        ]);
    }

    public function open(Request $request)
    {
        if (PHP_OS_FAMILY !== 'Windows') {
            return back()->with('error', 'Cette fonctionnalité est réservée à Windows.');
        }

        $path = base_path();
        
        // Security check: ensure path is valid and exists
        if (!is_dir($path)) {
            return back()->with('error', 'Le dossier du projet est introuvable.');
        }

        // Execute explorer command safely
        // Using shell_exec or Process to open explorer
        // "explorer.exe" is a standard Windows command
        
        try {
            // Using pclose(popen()) to run in background without hanging PHP
            pclose(popen("start explorer.exe \"$path\"", "r"));
            
            return back()->with('success', 'Dossier ouvert dans l\'explorateur Windows.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'ouverture du dossier : ' . $e->getMessage());
        }
    }
}
