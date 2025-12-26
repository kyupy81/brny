<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Spatie\Permission\Models\Role;

echo "--- SETUP ADMIN USER ---\n";

try {
    // Ensure Admin Role exists
    $role = Role::firstOrCreate(['name' => 'admin']);
    
    // Create or Update Admin User
    $admin = User::updateOrCreate(
        ['email' => 'admin@brny.com'],
        [
            'name' => 'Super Admin',
            'password' => bcrypt('password'), // Default password
            'status' => 'ACTIVE'
        ]
    );
    
    $admin->assignRole('admin');
    
    echo "Admin User Ready:\n";
    echo "Email: admin@brny.com\n";
    echo "Password: password\n";
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}