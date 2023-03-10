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
           'crear-numeros',
           'editar-numeros',
           'eliminar-numeros',
           'listar-lugares',
           'crea-lugares',
           'editar-lugares',
           'eliminar-lugares',
           'listar-usuarios',
           'listar-historial',
           'crear-historial',
           'editar-historial',
           'eliminar-historial',
           'crear-usuarios',
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
           'eliminar-todo',
           'eliminar-boleto',
           'listar-boletos',
           'unico-listar',
           'unico-crear',
           'unico-editar'
        ]; 


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        

    }

}
