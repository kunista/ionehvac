<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        # Role has many Users
        # Define a one-to-many relationship.
        return $this->hasMany('App\User');
    }

    public static function getForDropdown()
    {
        $roles = Role::orderBy('name')->get();
        $rolesForDropdown = [0 => 'Choose one...'];
        foreach ($roles as $role) {
            $rolesForDropdown[$role->id] = $role->name;
        }

        return $rolesForDropdown;
    }

}
