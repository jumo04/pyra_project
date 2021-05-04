<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
  

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Juan Fernando',
            'email' => 'juan@gmail.com',
            'cedula' => '1017201121',
            'place' => 'Medellin',
            'email_verified_at' => now(),
            'password' => Hash::make('juanfernando'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]); */
    }
}
