<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view_leads']);
        Permission::create(['name' => 'create_leads']);
        Permission::create(['name' => 'edit_leads']);
        Permission::create(['name' => 'delete_leads']);
        Permission::create(['name' => 'edit_status_leads']);
        Permission::create(['name' => 'view_student_dashboard']);

        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'SuperAdmin']);
        // $role->givePermissionTo('edit articles');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::where('email', 'superadmin@test.com')->first();
        $user->assignRole($role);

        // or may be done by chaining
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['view_leads', 'create_leads']);
        $role = Role::create(['name' => 'student'])
            ->givePermissionTo(['view_student_dashboard']);
        
    }
}
