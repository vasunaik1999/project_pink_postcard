<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'pinkpostcards@gmail.com',
            'password' => Hash::make('Random_Pink_Postcards'),
        ]);
        $user->attachRole('superadmin');
    }
}
