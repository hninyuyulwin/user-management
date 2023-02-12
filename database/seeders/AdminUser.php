<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Admin'
        ]);
        User::create([
            'name' => 'Lavender',
            'username' => 'lavender',
            'role_id' => $role->id,
            'phone' => '09985698787',
            'email' => 'lavender@gmail.com',
            'password' => Hash::make('lavender'),
            'gender' => 'female',
        ]);
    }
}
