<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\User::create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role'     => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
