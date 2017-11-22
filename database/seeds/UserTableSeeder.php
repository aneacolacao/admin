<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_project_m = Role::where('name', 'project_m')->first();
	    $role_manager  = Role::where('name', 'master')->first();
	    $role_finance  = Role::where('name', 'finance')->first();
	    $project_m = new User();
	    $project_m->name = 'Nombre Ejecutiv@';
	    $project_m->email = 'project_m@example.com';
	    $project_m->password = bcrypt('secret');
	    $project_m->save();
	    $project_m->roles()->attach($role_project_m);
	    $manager = new User();
	    $manager->name = 'Maestro Nombre';
	    $manager->email = 'manager@example.com';
	    $manager->password = bcrypt('secret');
	    $manager->save();
	    $manager->roles()->attach($role_manager);
	    $finance = new User();
	    $finance->name = 'Finanzas Nombre';
	    $finance->email = 'finance@example.com';
	    $finance->password = bcrypt('secret');
	    $finance->save();
	    $finance->roles()->attach($role_finance);
    }
}
