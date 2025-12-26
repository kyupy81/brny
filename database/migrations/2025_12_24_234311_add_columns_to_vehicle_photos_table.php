<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations (Création des tables de permissions).
     */
    public function up(): void
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        if (Schema::hasTable($tableNames['permissions'])) {
            return;
        }

        // 1. Table Permissions
        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        // 2. Table Roles
        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        // 3. Table Model Has Permissions (Morph)
        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->string($columnNames['model_morph_type']);
            $table->unsignedBigInteger('permission_id');

            $table->primary([$columnNames['model_morph_key'], $columnNames['model_morph_type'], 'permission_id'], 'model_has_permissions_permission_model_type_primary');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');
        });

        // 4. Table Model Has Roles (Morph)
        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->string($columnNames['model_morph_type']);
            $table->unsignedBigInteger('role_id');

            $table->primary([$columnNames['model_morph_key'], $columnNames['model_morph_type'], 'role_id'], 'model_has_roles_role_model_type_primary');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');
        });

        // 5. Table Role Has Permissions (Pivot)
        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');

            $table->primary(['permission_id', 'role_id']);

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');
        });
    }

    /**
     * Annule les migrations (Suppression des tables ET de la colonne photo).
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        // Nettoyage des tables de permissions
        Schema::dropIfExists($tableNames['role_has_permissions']);
        Schema::dropIfExists($tableNames['model_has_roles']);
        Schema::dropIfExists($tableNames['model_has_permissions']);
        Schema::dropIfExists($tableNames['roles']);
        Schema::dropIfExists($tableNames['permissions']);

        // Nettoyage de la table vehicle_photos
        if (Schema::hasColumn('vehicle_photos', 'uploaded_by')) {
            Schema::table('vehicle_photos', function (Blueprint $table) {
                // On retire d'abord la contrainte, puis la colonne
                $table->dropForeign(['uploaded_by']);
                $table->dropColumn('uploaded_by');
            });
        }
    }
};