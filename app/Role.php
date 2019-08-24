<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
