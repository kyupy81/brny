<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserImportController extends Controller
{
    public function show()
    {
        return view('admin.users.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
            'mode' => 'required|in:skip,update'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        array_shift($rows);

        $stats = ['created' => 0, 'updated' => 0, 'errors' => []];

        foreach ($rows as $index => $row) {
            $role = strtolower(trim($row[0] ?? ''));
            $name = trim($row[1] ?? '');
            $phone = trim($row[2] ?? '');
            $email = trim($row[3] ?? '');
            $pin = trim($row[4] ?? '');

            if (empty($role) || empty($name) || empty($phone)) {
                $stats['errors'][] = "Ligne " . ($index + 2) . ": Données manquantes.";
                continue;
            }

            if (!in_array($role, ['agent', 'client'])) {
                $stats['errors'][] = "Ligne " . ($index + 2) . ": Rôle invalide ($role).";
                continue;
            }

            $user = User::where('phone', $phone)->first();

            if ($user && $request->mode === 'skip') {
                continue;
            }

            try {
                if (!$user) {
                    $user = new User();
                    $user->phone = $phone;
                    $user->password = Hash::make($pin ?: ($role === 'client' ? '1234' : Str::random(8)));
                    $user->status = 'ACTIVE';
                    if ($role === 'agent') {
                        $user->agent_code = 'AG-' . strtoupper(Str::random(6));
                    }
                    $stats['created']++;
                } else {
                    $stats['updated']++;
                }

                $user->name = $name;
                $user->email = $email ?: null;
                $user->save();

                $user->syncRoles([$role]);

            } catch (\Exception $e) {
                $stats['errors'][] = "Ligne " . ($index + 2) . ": " . $e->getMessage();
            }
        }

        return view('admin.users.import_result', compact('stats'));
    }
}
