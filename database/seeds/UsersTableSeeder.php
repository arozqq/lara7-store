<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'superadmin',
            'role' => 'super-admin',
            'username' => 'superadmin',
            'password' => bcrypt('superadmin'),
            'email' => 'superadmin@gmail.com',
            'email_verify_at' => now(),
        ]);
        $user->profile()->save(new \App\Profile);
        return $user;
    }
}
