<?php

use Illuminate\Database\Seeder;
use App\Models\permission_category_connect;

class PermissionCategoryConnectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $this->command->info('** Started Seeding for Roles **');
        
        $connect= permission_category_connect::create([
            'permission'              => '1',
            'category'        => '1',
        ]);

        $connect= permission_category_connect::create([
            'permission'              => '2',
            'category'        => '1',
        ]);

        $connect= permission_category_connect::create([
            'permission'              => '3',
            'category'        => '1',
        ]);

        $connect= permission_category_connect::create([
            'permission'              => '4',
            'category'        => '2',
        ]);

        $connect= permission_category_connect::create([
            'permission'        => '5',
            'category'        => '2',
        ]);

        $this->command->info('** Completed Seeding for permission category connect **');
    }
}
