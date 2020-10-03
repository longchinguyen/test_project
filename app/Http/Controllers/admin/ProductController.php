<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Traits\HandelImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HandelImage;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['user_id'] = auth()->id();
        $data['image'] = '';
        $product = $this->product->create($data);
        $this->createImage($request, $product);

        return response()->json([
            'message' => 'create success',
            'product' => $product,
            'status' => 200
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->findOrFail($id);
        $data = $request->except('image');
        $data['image'] = $this->updateImage($request, $product->image);
        $product->update($data);

        return response()->json(
            [
                'message' => 'update success',
                'product' => $product,
                'code' => 200
            ],
            200);
    }

    public function show($id)
    {
        $product = $this->product->findOrFail($id);

        return response()->json([
            'message' => 'get data success',
            'product' => $product,
            'code' => 200
        ], 200);
    }

    public function destroy($id)
    {
        $this->product->destroy($id);
        return response()->json([
            'message' => 'delete product success',
            'code' => 200
        ], 200);
    }

    public function search(Request $request)
    {
        $data['name'] = $request->name ?? null;
        $data['quantity'] = $request->quantity ?? 5;
        $products = $this->product->search($data);

        return view('admin.table', compact('products'));
    }
}
