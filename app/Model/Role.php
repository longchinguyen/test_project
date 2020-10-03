<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name', 'display_name'];

    public function getAllRole()
    {
        return $this->all()->paginate(5);
    }

    public function getRole($id)
    {
        $role = $this->findOrFail($id);
        return $role;
    }

    public function updateRole($attribute)
    {
        $role = $this->update($attribute);
        return $role;
    }

    public function users()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function searchRole($name)
    {
        return Role::withName($name)->paginate(6);
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%' . $name . '%') : null;
    }
}
