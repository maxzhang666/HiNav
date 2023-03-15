<?php

namespace Database\Seeders;

use Dcat\Admin\Models\AdminTablesSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(AdminTablesSeeder $adminTablesSeeder)
    {
        // \App\Models\User::factory(10)->create();
        $adminTablesSeeder->run();
    }
}
