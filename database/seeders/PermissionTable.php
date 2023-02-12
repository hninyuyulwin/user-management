<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::insert([
            ['name' => 'Role'],
            ['name' => 'User']
        ]);
        Permission::insert([
            ['name' => 'role-list','feature_id'=>1],
            ['name' => 'role-create','feature_id'=>1],
            ['name' => 'role-edit','feature_id'=>1],
            ['name' => 'role-delete','feature_id'=>1],
            ['name' => 'user-list','feature_id'=>2],
            ['name' => 'user-create','feature_id'=>2],
            ['name' => 'user-edit','feature_id'=>2],
            ['name' => 'user-delete','feature_id'=>2],
        ]);
    }
}
