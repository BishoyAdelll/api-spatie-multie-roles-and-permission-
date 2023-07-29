<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_list=Permission::create(['name'=>'user.list']);
        $user_view=Permission::create(['name'=>'user.view']);
        $user_update=Permission::create(['name'=>'user.update']);
        $user_edit=Permission::create(['name'=>'user.edit']);
        $user_delete=Permission::create(['name'=>'user.delete']);

        
        $admin =User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>bcrypt('password'),
        ]);
        $admin_role =Role::create(['name'=>'admin']);
        $admin->assignRole($admin_role);
        $admin_role->givePermissionTo([
            $user_list,
            $user_view,
            $user_update,
            $user_edit,
            $user_delete,
        ]);
        $admin->givePermissionTo([
            $user_list,
            $user_view,
            $user_update,
            $user_edit,
            $user_delete,
        ]);

        $user =User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password'=>bcrypt('password'),
        ]);
        $user_role =Role::create(['name'=>'user']);
        $user->assignRole($user_role);
        $user_role->givePermissionTo([
            $user_list,
        ]);
        $user->givePermissionTo([
            $user_list,
        ]);
        
        $teacher=User::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password'=>bcrypt('password'),
        ]);
        $teacher_role=Role::create(['name'=>'teacher']);
        $teacher->assignRole($teacher_role);
        $teacher_role->givePermissionTo([
            $user_edit
        ]);
        $teacher->givePermissionTo([
            $user_edit
        ]);

        $center=User::create([
            'name' => 'center',
            'email' => 'center@center.com',
            'password'=>bcrypt('password'),
        ]);
        $center_role=Role::create(['name'=>'center']);
        $center->assignRole($center_role);
        $center_role->givePermissionTo([
            $user_edit,
            $user_view
        ]);
        $center->givePermissionTo([
            $user_edit,
            $user_view
        ]);
    }
}
