<?php

namespace App\Model;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'user_id', 'quantity', 'description'];


    public function getAllProduct()
    {
        $product = $this->all();

        return $product;
    }

    public function getProduct($id)
    {
        $product = $this->findOFail($id);

        return $product;
    }

    public function createProduct($attribute)
    {
        $attribute['user_id'] = auth()->id();
        $product = $this->create($attribute);

        return $product;
    }

    public function updateProduct($attribute)
    {
        $product = $this->update($attribute);
        return $product;
    }

}

