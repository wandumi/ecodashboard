<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'SuperAdmin',
            'Admin',
            'Manager',
            'User',
         ];
 
 
         foreach ($roles as $role) {
              Role::create(['name' => $role]);
         }

         //seed this permission table with the following artisan command
         //$php artisan db:seed --class=RolesTableSeeder
    }
}
