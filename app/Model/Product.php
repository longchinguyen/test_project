<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
define('PRODUCT_PATH','images/');
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price', 'quantity', 'description','image'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function search($data)
    {
        return Product::withName($data['name'])->latest('id')->paginate($data['quantity']);
    }

    public function scopeWithName($query, $search)
    {
        $search = trim($search);
        return $query->where(function ($query) use ($search) {
            $query->where('price', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('quantity', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        });
    }
}

