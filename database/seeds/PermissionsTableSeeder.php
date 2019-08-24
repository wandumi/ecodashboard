<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('permissions')->insert([
        //     'name' => 'Create',
        //     'slug' => 'User of the siae can create', 
        // ]);

        $permissions = [
            'report-create',
            'role-read',
            'role-edit',
            'role-delete',
            'report-create',
            'report-read',
            'report-edit',
            'report-delete'
         ];
 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

         //seed this permission table with the following artisan command
         //$php artisan db:seed --class=PermissionsTableSeeder
    }
}
