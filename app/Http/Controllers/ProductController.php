<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Get All Products
    public function index() {
        return response()->json(Product::all(), 200);
    }

    // 2. Get Single Product
    public function show($id) {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Not Found'], 404);
        return response()->json($product, 200);
    }

    // 3. Search (Bonus)
    public function search(Request $request) {
        $name = $request->query('name');
        $products = Product::where('title', 'LIKE', "%{$name}%")->get();
        return response()->json($products, 200);
    }
public function store(Request $request) {
    $data = $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'required',
        'image' => 'required',
        'category' => 'required',
    ]);

    return Product::create($data);
}
}