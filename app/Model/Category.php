<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categores';

    protected $fillable = ['name'];

    public function getAllCategory()
    {
        $category = $this->all();
        return $category;
    }

    public function searchCategory($name)
    {
        return Category::withName($name)->paginate(3);
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like' ,'%'.$name.'%') : null;
    }

    public function updateCategory($attribute)
    {
        $user = $this->update($attribute);
        return $user;
    }
}
