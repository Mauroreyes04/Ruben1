<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleProfe = Role::create(['name' => 'Profe']);
        $roleAprendiz = Role::create(['name' => 'Aprendiz']);

        //aprendiz
        $permission = Permission::create(['name' => 'aprendiz.vista_consulta_usuario'])->syncRoles([$roleAprendiz,$roleAdmin]);
        //profe/instructor
        $permission = Permission::create(['name' => 'profe.vista_register_score'])->syncRoles([$roleProfe,$roleAdmin]);
        $permission = Permission::create(['name' => 'profe.asistencia'])->syncRoles([$roleProfe,$roleAdmin]);
        $permission = Permission::create(['name' => 'profe.vista_consulta_usuario'])->syncRoles([$roleProfe,$roleAdmin]);
        $permission = Permission::create(['name' => 'profe.horarios'])->syncRoles([$roleProfe,$roleAdmin]);
        //admin
        $permission = Permission::create(['name' => 'admin.usuarios'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.horario.guardar'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.horario.agregar'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.horario.horario'])->assignRole($roleAdmin);
        
        $permission = Permission::create(['name' => 'admin.instructor'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.apprentice'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.vista_register_instructor'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.vista_register_materia'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.vista_register_apprentice'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.registrar_asistencia'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.instructores_store'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.materias_store'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.apprentice_store'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.scores_store'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.scores_search'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.index'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.store'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.create'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.show'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.edit'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.update'])->assignRole($roleAdmin);
        $permission = Permission::create(['name' => 'admin.usuarios.destroy'])->assignRole($roleAdmin);
    
}
}