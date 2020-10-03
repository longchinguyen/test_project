<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categores = $this->category->all();
        return view('category.index', compact('categores'));
    }

    public function table()
    {
        $categores = $this->category->getAllCategory();
        return view('category.table', compact('categores'));
    }

    public function store(Request $request)
    {
        $categores = $this->category->create($request->all());
        return response()->json([
            'message' => 'them thanh cong',
            'categores' => $categores,
            'status' => '201'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $category->updateCategory($request->all());

        return response()->json([
            'message' => 'them thanh cong',
            'data' => $category,
            'code' => '201'
        ], 201);
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $categores = $this->category->searchCategory($name);
        return view('category.table', compact('categores'));
    }

    public function getBy($id)
    {
        $categores = $this->category->findOrFail($id);
        return response()->json([
            'message' => 'lay thanh cong',
            'category' => $categores,
            'status' => '200'
        ], 200);
    }

    public function destroy($id)
    {
        $category = $this->category->destroy($id);
        return response()->json([
            'message' => 'xoa thanh cong',
            'code' => '204'
        ], 204);
    }
}
