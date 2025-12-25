<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController
{
    //
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض كل التصنيفات
    public function index() { 
        return response()->json(Category::all()); 
    }

    // إضافة تصنيف جديد
    public function store(Request $request) {
        $category = Category::create(['name' => $request->name]);
        return response()->json(['message' => 'Category Created', 'category' => $category]);
    }

    // عرض تصنيف واحد
    public function show($id) { 
        return response()->json(Category::find($id)); 
    }

    // تعديل تصنيف
    public function update(Request $request, $id) {
        $category = Category::find($id);
        if($category) {
            $category->update($request->all());
            return response()->json(['message' => 'Category Updated', 'category' => $category]);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }

    // حذف تصنيف
    public function destroy($id) {
        Category::destroy($id);
        return response()->json(['message' => 'Category Deleted']);
    }
}