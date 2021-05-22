<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hardik Savani', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'cedula' => '1017201121',
            'place' => 'Medellin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        $role = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
