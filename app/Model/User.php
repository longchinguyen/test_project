<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function getAllUser()
    {
        $user = $this->all();
        return $user;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'users_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function getUser($id)
    {
        $user = $this->findOrFail($id);
        return $user;
    }

    public function updateUser($attribute)
    {
        $user = $this->update($attribute);
        return $user;
    }

    public function searchUser($name)
    {
        return User::withName($name)->paginate(3);
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%' . $name . '%') : null;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}

