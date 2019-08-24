<?php

namespace App\Permissions;
use App\Role;
use App\Permission;

trait HasPermissionsTrait
{
    //Adding the user permissions to the user 
    public function givePermissionTo(...$permission)
    {
        $permission = $this->getAllPermissions(array_flatten($permission));
        //get permissions models
        if($permission === null)
        {
            return $this;
        }

        //saveMany
        // $this->permission()->saveMany($permission);
        // $this->permissions()->saveMany($permissions);
        $this->permissions()->syncWithoutDetaching($permission);

        return $this;
    }

    //Removing the user permissions 
    public function withdrawPermissionTo(...$permission)
    {
        $permission = $this->getAllPermissions(array_flatten($permission));

        //detach wont fail if null is passed or if something exist
        $this->permissions()->detach($permission);

        return $this;
    }

    //update user with the permissions
    public function updatePermissions(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionTo($permissions);
        
    }
    

     /**
     * Checking if the user has roles to the system.
     *
     * @var array
     */
    public function hasRole(...$roles)
    {
        //if the user has the roles being checked with
        foreach($roles as $role){
            if($this->roles->contains('name', $role)){
                return true;
            }
        }
        return false;
    }

     /**
     * User has the permission to the app section.
     *
     * @var array
     */
    public function hasPermissionTo($permission)
    {
        //hass permisssion through a role
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);

    }

    //Checking if the user has the role and the permission to view something
    protected function hasPermissionThrough($permission)
    {
        foreach($permission->roles as $role)
        {
            if($this->roles->contains($role))
            {
                return true;
            }
        }
        return false;
    }

    protected function hasPermission($permission)
    {
        //already developed
        return (bool) $this->permission->where('name', $permission->name)->count();
    }

     /**
     * Retrieve the user permission given to them.
     *
     * @var array
     */
    protected function getAllPermissions($permission)
    {
        return Permission::whereIn('name', $permission)->get();
    }

     /**
     * The relationships between users and roles to permission which is .
     * Many to many relationships including pivotal table combined
     * @var array
     */

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
}