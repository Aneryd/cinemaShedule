<?php

use App\Models\Role;

trait HasRoles
{
    public function roles(){
        return $this->belongsToMany(Role::class, "user_roles");
    }

    public function hasRole(... $roles){
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}