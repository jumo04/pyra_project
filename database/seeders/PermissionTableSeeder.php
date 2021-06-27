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
           'listar-numeros',
           'crea-numeros',
           'editar-numeros',
           'eliminar-numeros',
           'listar-lugares',
           'crea-lugares',
           'editar-lugares',
           'eliminar-lugares',
           'listar-usuarios',
           'crea-usuarios',
           'editar-usuarios',
           'eliminar-usuarios',
           'rol-create',
           'rol-edit',
           'rol-delete',
           'rol-list',
           'desbloquear-numero',
           'bloquear-numero',
           'loteria-listar',
           'loteria-crear',
           'loteria-editar',
           'loteria-delete',
           'eliminar-todo'
        ]; 

    

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        

    }

}
