<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_project_m = new Role();
	    $role_project_m->name = 'project_m';
	    $role_project_m->description = 'Ejecutiva';
	    $role_project_m->save();
	    $role_manager = new Role();
	    $role_manager->name = 'master';
	    $role_manager->description = 'Maestro/Admin';
	    $role_manager->save();
	    $role_finance = new Role();
	    $role_finance->name = 'finance';
	    $role_finance->description = 'Finanzas';
	    $role_finance->save();
    }
}
