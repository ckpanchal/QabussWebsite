<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionCategorySeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionCategoryConnectSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
