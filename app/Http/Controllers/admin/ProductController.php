<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ProductRequest;
use App\Model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
//        dd(Hash::make('12345'));
        $products = $this->product->getAllProduct();

        return view("admin.index", compact('products'));
    }


    public function store(ProductRequest $request)
    {
        $attribute = $request->all();
        $product = $this->product->createProduct($attribute);
        return response()->json([
            'message' => 'update success',
            'data' => $product,
            'code' => 201
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->getProduct($id);
        $product->updateProduct($request->all());

        return response()->json([
            'message' => 'update success',
            'data' => $product,
            'code' => 200
        ], 200);
    }

    public function getData($id)
    {
        $product = $this->product->getProduct($id);

        return response()->json([
            'message' => 'get data success',
            'data' => $product,
            'code' => 200
        ], 200);
    }

    public function table()
    {
        $products = $this->product->getAllProduct();

        return view("admin.table", compact('products'));
    }

    public function destroy($id)
    {
        $product = $this->product->destroy($id);

        return response()->json([
            'message' => 'delete product success',
            'code' => 204
        ], 204);
    }
}
