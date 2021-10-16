<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rolepermissions:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync new roles and permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (file_exists(config_path('acl.php'))) {
            $this->createRoles();
            $this->createPermissions();

            $this->assignPermissionsToRoles();
            $this->removeUselessRoles();

            $this->assignRoleAddmin();
        }
    }

    /**
     * Insert new roles to database
     * 
     * @return void
     */
    private function createRoles()
    {
        $roles = $this->getRoles();

        if ($roles) {
            foreach ($roles as $role) {
                Role::create(['name' => $role]);
            }
        }

        $this->info('Roles created successfully!');
    }

    /**
     * Insert permissions data in database
     * 
     * @return void
     */
    private function createPermissions()
    {
        $permissions = $this->getPermissions();

        if ($permissions) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }

        $this->info('Permissions created successfully!');
    }

    /**
     * Sync roles wth permissions
     * 
     * @return void
     */
    private function assignPermissionsToRoles()
    {
        $items = config('acl');
        
        foreach($items as $key => $value) {
            $role = Role::where('name', $key)->first();
            
            $role->syncPermissions(array_values($value));
        }
    }

    /**
     * Remove useless roles
     * 
     * @return void
     */
    private function removeUselessRoles()
    {
        $roles = array_keys(config('acl'));
        $old_roles = Role::all()->pluck('name', 'id')->toArray();

        $uselessRoles = array_diff($old_roles, $roles);

        foreach($uselessRoles as $key => $value) {
            $role = Role::find($key);
            
            $this->revokeUsersUselessPermissions($role->permissions);

            $role->revokePermissionTo(
                $role->permissions()->pluck('name')->toArray()
            );

            $role->delete();
        }
    }
    
    /**
     * Revoke useless permissions from users
     * 
     * @return void
     */
    private function revokeUsersUselessPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $user = User::permission($permission->name)->first();

            if($user)
                $user->revokePermissionTo($permission->name);
        }
    }

    /**
     * Return new roles from config
     * 
     * @return array
     */
    private function getRoles()
    {
        $roles = array_keys(config('acl'));
        $old_roles = Role::all()->pluck('name')->toArray();

        $results = array_diff($roles, $old_roles);

        return $results ?? $roles;
    }

    /**
     * Return new permissions
     * 
     * @return array
     */
    private function getPermissions()
    {
        $permissions = Arr::flatten(config('acl'));
        $old_permissions = Permission::all()->pluck('name')->toArray();

        $results = array_diff($permissions, $old_permissions);

        return $results ?? $permissions;
    }

    /**
     * Assgin admin role to admin users
     * 
     * @return void
     */
    private function assignRoleAddmin()
    {
        $admin_ids = explode(',', env('ADMIN_IDS'));

        $admins = User::whereIn('id', $admin_ids)->get();

        foreach($admins as $admin) {
            $admin->assignRole(config('roles.admin'));
        }
    }
}
