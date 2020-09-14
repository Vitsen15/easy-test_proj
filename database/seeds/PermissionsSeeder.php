<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles.
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create permissions.
        $createPostsPermission = Permission::create(['name' => 'create posts']);
        $editPostsPermission = Permission::create(['name' => 'edit posts']);
        $deletePostsPermission = Permission::create(['name' => 'delete posts']);
        $blockUserPermission = Permission::create(['name' => 'block user']);

        // Assign admin permissions.
        $adminRole->givePermissionTo($createPostsPermission);
        $adminRole->givePermissionTo($editPostsPermission);
        $adminRole->givePermissionTo($deletePostsPermission);
        $adminRole->givePermissionTo($blockUserPermission);

        // Assign user permissions.
        $userRole->givePermissionTo($createPostsPermission);
        $userRole->givePermissionTo($editPostsPermission);
    }
}
