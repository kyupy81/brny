<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserImportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create roles
        Role::create(["name" => "admin"]);
        Role::create(["name" => "agent"]);
        Role::create(["name" => "client"]);
    }

    public function test_admin_can_view_import_page()
    {
        $admin = User::factory()->create();
        $admin->assignRole("admin");

        $response = $this->actingAs($admin)->get(route("admin.users.import"));

        $response->assertStatus(200);
        $response->assertViewIs("admin.users.import");
    }

    public function test_admin_can_import_users()
    {
        $admin = User::factory()->create();
        $admin->assignRole("admin");

        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue("A1", "Role");
        $sheet->setCellValue("B1", "Name");
        $sheet->setCellValue("C1", "Phone");
        $sheet->setCellValue("D1", "Email");
        $sheet->setCellValue("E1", "PIN");

        $sheet->setCellValue("A2", "agent");
        $sheet->setCellValue("B2", "Test Agent");
        $sheet->setCellValue("C2", "1234567890");
        $sheet->setCellValue("D2", "agent@test.com");
        $sheet->setCellValue("E2", "1234");

        $writer = new Xlsx($spreadsheet);
        $path = sys_get_temp_dir() . "/test_import.xlsx";
        $writer->save($path);

        $file = new UploadedFile($path, "test_import.xlsx", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", null, true);

        $response = $this->actingAs($admin)->post(route("admin.users.import.store"), [
            "file" => $file,
            "mode" => "skip",
        ]);

        $response->assertStatus(200);
        $response->assertViewIs("admin.users.import_result");
        
        $this->assertDatabaseHas("users", [
            "email" => "agent@test.com",
            "phone" => "1234567890",
            "name" => "Test Agent",
        ]);

        $user = User::where("email", "agent@test.com")->first();
        $this->assertTrue($user->hasRole("agent"));
        $this->assertNotNull($user->agent_code);
    }
}

