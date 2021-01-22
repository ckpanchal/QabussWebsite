<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('** Started Seeding for Users **');
        
        $user = User::create([
            'registerid'              => 'QB7213688',
            'name'              => 'Super Admin',
            'phone'              => '12345678',
            'image'              => '/image/user_dp/image/user.jpg',
            'limit'              => '3',
            'approve'              => '1',
            'email'             => 'admin@qabuss.com',
            'password'          => bcrypt('password'),
        ])->assignRole('Super Admin');

        $user = User::create([
            'registerid'              => 'QB7213688',
            'name'              => 'Business Editor',
            'phone'              => '12345678',
            'image'              => '/image/user_dp/image/user.jpg',
            'limit'              => '3',
            'approve'              => '1',
            'email'             => 'business@qabuss.com',
            'password'          => bcrypt('password'),
        ])->assignRole('Business Editor');

        $user = User::create([
            'registerid'              => 'QB7213688',
            'name'              => 'Event Editor',
            'phone'              => '12345678',
            'image'              => '/image/user_dp/image/user.jpg',
            'limit'              => '3',
            'approve'              => '1',
            'email'             => 'event@qabuss.com',
            'password'          => bcrypt('password'),
        ])->assignRole('Event Editor');

        $user = User::create([
            'registerid'              => 'QB7213688',
            'name'              => 'News Editor',
            'phone'              => '12345678',
            'image'              => '/image/user_dp/image/user.jpg',
            'limit'              => '3',
            'approve'              => '1',
            'email'             => 'news@qabuss.com',
            'password'          => bcrypt('password'),
        ])->assignRole('News Editor');

        $user = User::create([
            'registerid'              => 'QB7213688',
            'name'              => 'Offer Editor',
            'phone'              => '12345678',
            'image'              => '/image/user_dp/image/user.jpg',
            'limit'              => '3',
            'approve'              => '1',
            'email'             => 'offer@qabuss.com',
            'password'          => bcrypt('password'),
        ])->assignRole('Offer Editor');

        $this->command->info('** Completed Seeding for Users **');
    }
}
