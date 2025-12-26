# Code Citations

## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web')
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web')
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web')
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web')
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web')
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guar
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guar
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guar
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guar
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guar
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        
```


## License: unknown
https://github.com/Brunorobson/sistema-enapic/blob/f73d0e295e2c1c8ecfba70b0e12d0d5cf99c606d/database/migrations/2023_05_30_015027_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/mian-dani/zimo-transfer/blob/09f8569d18ce1c17a3d84db4d991fc21026528e1/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/JeffersonHF06/SISCOA/blob/fc9b8274a789f4766b23e6fa868913d88a049c03/database/migrations/2014_10_12_000000_create_users_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/AhmedMElhalaby/UniStie/blob/3e01d3e2b42a373610973c43ebfd87d7c1c4a98a/database/migrations/2022_07_26_031216_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: unknown
https://github.com/jhon78963/app_lubricentros/blob/c088874929bad26a485d49f8d2dec396bb29c5e4/database/migrations/2023_05_13_020345_create_permissions_table.php

```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->timestamps();
        });

        Schema::create('
```


## License: GPL-3.0
https://github.com/TortleTurtle/Cuppy-webshop/blob/bdb8863300a9165e6205b43a49d62f86128c3e0b/database/migrations/2013_01_10_165245_permissions_roles.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/Irfan-Chowdhury/PeoplePro/blob/00bd4c56746f5a1c6e0c98041625cc808fabab9b/backup/database/migrations/primary/2023_05_06_053298_create_role_has_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/ecemozturk/mc_db/blob/07da8ed48b0ea482089fb86680f4401e2ef5ef85/database/migrations/2023_03_23_115413_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site/blob/649ae479559144ebd8e3037363c1dbd8339b6df1/app/database/migrations/2013_05_21_024934_entrust_permissions.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/taviroquai/laraproto/blob/3792e8857ba980ae5b86a06fcb2802dcb10edd35/database/migrations/2015_07_27_144020_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/andela/pibbble/blob/2132bd5f7854814b2f11cf48d7404eb7a7b7ac87/database/migrations/2016_02_17_084239_create_roles_permissions_pivottable.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/pumdt1/neliserp/blob/ab03a4105beb3ac03aa3e87fce369fe2d551c0c0/database/migrations/2018_01_01_050000_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
```


## License: unknown
https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site/blob/649ae479559144ebd8e3037363c1dbd8339b6df1/app/database/migrations/2013_05_21_024934_entrust_permissions.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/andela/pibbble/blob/2132bd5f7854814b2f11cf48d7404eb7a7b7ac87/database/migrations/2016_02_17_084239_create_roles_permissions_pivottable.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: MIT
https://github.com/helori/laravel-permission/blob/49ab3e8782481e8c01d8f40a3367e97544d14b15/src/Migrations/create_permission_tables.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/pumdt1/neliserp/blob/ab03a4105beb3ac03aa3e87fce369fe2d551c0c0/database/migrations/2018_01_01_050000_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: GPL-3.0
https://github.com/TortleTurtle/Cuppy-webshop/blob/bdb8863300a9165e6205b43a49d62f86128c3e0b/database/migrations/2013_01_10_165245_permissions_roles.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/djaiss/v2/blob/e23ed33e825aaefc572ecb972eba1aafd6615e7f/database/migrations/2023_02_26_225424_create_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/ecemozturk/mc_db/blob/07da8ed48b0ea482089fb86680f4401e2ef5ef85/database/migrations/2023_03_23_115413_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/taviroquai/laraproto/blob/3792e8857ba980ae5b86a06fcb2802dcb10edd35/database/migrations/2015_07_27_144020_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/Irfan-Chowdhury/PeoplePro/blob/00bd4c56746f5a1c6e0c98041625cc808fabab9b/backup/database/migrations/primary/2023_05_06_053298_create_role_has_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema
```


## License: unknown
https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site/blob/649ae479559144ebd8e3037363c1dbd8339b6df1/app/database/migrations/2013_05_21_024934_entrust_permissions.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/taviroquai/laraproto/blob/3792e8857ba980ae5b86a06fcb2802dcb10edd35/database/migrations/2015_07_27_144020_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/andela/pibbble/blob/2132bd5f7854814b2f11cf48d7404eb7a7b7ac87/database/migrations/2016_02_17_084239_create_roles_permissions_pivottable.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/Irfan-Chowdhury/PeoplePro/blob/00bd4c56746f5a1c6e0c98041625cc808fabab9b/backup/database/migrations/primary/2023_05_06_053298_create_role_has_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/ecemozturk/mc_db/blob/07da8ed48b0ea482089fb86680f4401e2ef5ef85/database/migrations/2023_03_23_115413_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/yan-afriyoko-coder/project-cvroad-dev/blob/29be8b876848fca631f97ddf5d76c0ac3088c925/database/migrations/2024_03_13_170515_drop_roles_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: MIT
https://github.com/helori/laravel-permission/blob/49ab3e8782481e8c01d8f40a3367e97544d14b15/src/Migrations/create_permission_tables.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/pumdt1/neliserp/blob/ab03a4105beb3ac03aa3e87fce369fe2d551c0c0/database/migrations/2018_01_01_050000_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: GPL-3.0
https://github.com/TortleTurtle/Cuppy-webshop/blob/bdb8863300a9165e6205b43a49d62f86128c3e0b/database/migrations/2013_01_10_165245_permissions_roles.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/djaiss/v2/blob/e23ed33e825aaefc572ecb972eba1aafd6615e7f/database/migrations/2023_02_26_225424_create_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site/blob/649ae479559144ebd8e3037363c1dbd8339b6df1/app/database/migrations/2013_05_21_024934_entrust_permissions.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/andela/pibbble/blob/2132bd5f7854814b2f11cf48d7404eb7a7b7ac87/database/migrations/2016_02_17_084239_create_roles_permissions_pivottable.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: MIT
https://github.com/helori/laravel-permission/blob/49ab3e8782481e8c01d8f40a3367e97544d14b15/src/Migrations/create_permission_tables.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/Irfan-Chowdhury/PeoplePro/blob/00bd4c56746f5a1c6e0c98041625cc808fabab9b/backup/database/migrations/primary/2023_05_06_053298_create_role_has_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/ecemozturk/mc_db/blob/07da8ed48b0ea482089fb86680f4401e2ef5ef85/database/migrations/2023_03_23_115413_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/taviroquai/laraproto/blob/3792e8857ba980ae5b86a06fcb2802dcb10edd35/database/migrations/2015_07_27_144020_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/pumdt1/neliserp/blob/ab03a4105beb3ac03aa3e87fce369fe2d551c0c0/database/migrations/2018_01_01_050000_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: GPL-3.0
https://github.com/TortleTurtle/Cuppy-webshop/blob/bdb8863300a9165e6205b43a49d62f86128c3e0b/database/migrations/2013_01_10_165245_permissions_roles.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/djaiss/v2/blob/e23ed33e825aaefc572ecb972eba1aafd6615e7f/database/migrations/2023_02_26_225424_create_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/yan-afriyoko-coder/project-cvroad-dev/blob/29be8b876848fca631f97ddf5d76c0ac3088c925/database/migrations/2024_03_13_170515_drop_roles_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role
```


## License: unknown
https://github.com/andrewelkins/Laravel-4-Bootstrap-Starter-Site/blob/649ae479559144ebd8e3037363c1dbd8339b6df1/app/database/migrations/2013_05_21_024934_entrust_permissions.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/taviroquai/laraproto/blob/3792e8857ba980ae5b86a06fcb2802dcb10edd35/database/migrations/2015_07_27_144020_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/andela/pibbble/blob/2132bd5f7854814b2f11cf48d7404eb7a7b7ac87/database/migrations/2016_02_17_084239_create_roles_permissions_pivottable.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: MIT
https://github.com/helori/laravel-permission/blob/49ab3e8782481e8c01d8f40a3367e97544d14b15/src/Migrations/create_permission_tables.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: GPL-3.0
https://github.com/TortleTurtle/Cuppy-webshop/blob/bdb8863300a9165e6205b43a49d62f86128c3e0b/database/migrations/2013_01_10_165245_permissions_roles.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/djaiss/v2/blob/e23ed33e825aaefc572ecb972eba1aafd6615e7f/database/migrations/2023_02_26_225424_create_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/ecemozturk/mc_db/blob/07da8ed48b0ea482089fb86680f4401e2ef5ef85/database/migrations/2023_03_23_115413_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/pumdt1/neliserp/blob/ab03a4105beb3ac03aa3e87fce369fe2d551c0c0/database/migrations/2018_01_01_050000_create_permission_role_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/Irfan-Chowdhury/PeoplePro/blob/00bd4c56746f5a1c6e0c98041625cc808fabab9b/backup/database/migrations/primary/2023_05_06_053298_create_role_has_permissions_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```


## License: unknown
https://github.com/yan-afriyoko-coder/project-cvroad-dev/blob/29be8b876848fca631f97ddf5d76c0ac3088c925/database/migrations/2024_03_13_170515_drop_roles_table.php

```
Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions
```

