<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'listar-usuarios',
           'crea-usuarios',
           'editar-usuarios',
           'eliminar-usuarios'
        ];

    

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        

    }

}
