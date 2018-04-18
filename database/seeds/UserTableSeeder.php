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
        $role_super_admin = Role::where('name', 'super_admin')->first();
        $role_administrator  = Role::where('name', 'administrator')->first();
        $role_direksi  = Role::where('name', 'direksi')->first();
        $role_admin_bengkel  = Role::where('name', 'admin_bengkel')->first();

        $super_admin = new User();
        $super_admin->name = 'Super Admin';
        $super_admin->email = 'superadmin@bengkel.com';
        $super_admin->password = bcrypt('secret');
        $super_admin->save();
        $super_admin->roles()->attach($role_super_admin);

        $administrator = new User();
        $administrator->name = 'Administrator';
        $administrator->email = 'administrator@bengkel.com';
        $administrator->password = bcrypt('secret');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $direksi = new User();
        $direksi->name = 'Direksi';
        $direksi->email = 'direksi@bengkel.com';
        $direksi->password = bcrypt('secret');
        $direksi->save();
        $direksi->roles()->attach($role_direksi);

        $admin_bengkel = new User();
        $admin_bengkel->name = 'Admin Bengkel';
        $admin_bengkel->email = 'admin_bengkel@bengkel.com';
        $admin_bengkel->password = bcrypt('secret');
        $admin_bengkel->save();
        $admin_bengkel->roles()->attach($role_admin_bengkel);
    }
}
