<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('** Started Seeding for Permissions **');
        
        Permission::create([
            'name'              => 'view_all_role',
            'guard_name'        => 'web',
        ]);
        Permission::create([
            'name'              => 'create_role',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_role',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_role',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'permission_role',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_user',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_user',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_user',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_user',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_user',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_business',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_business',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_business',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_business',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_business',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_offer',
            'guard_name'        => 'web',
        ]);
        
        Permission::create([
            'name'              => 'create_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_tag_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_tag_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_tag_offer',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_event',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_event',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_event',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_event',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_event',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_news',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_news',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_news',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_news',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_news',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_news_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_news_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_news_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_news_author',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_news_author',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_news_author',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_category',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_category_tag',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_category_tag',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_category_tag',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_qatar',
            'guard_name'        => 'web',
        ]);
        
        Permission::create([
            'name'              => 'create_qatar',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_qatar',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_qatar',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_page',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'view_all_apperance',
            'guard_name'        => 'web',
        ]);
        
        Permission::create([
            'name'              => 'create_location',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_location',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'delete_location',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'create_slider',
            'guard_name'        => 'web',
        ]);

        Permission::create([
            'name'              => 'edit_slider',
            'guard_name'        => 'web',
        ]);
        
        Permission::create([
            'name'              => 'delete_slider',
            'guard_name'        => 'web',
        ]);



        $this->command->info('** Completed Seeding for Permissions **');
    }
}
