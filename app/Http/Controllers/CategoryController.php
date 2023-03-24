<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('pages.category.index', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {

        try {

            $products = Product::where('category_id', $category->id)->get();
            // dd(count($products) >0);
            if (count($products) > 0) {
                return redirect()->back()->with('error', 'Data category ini masih memiliki relasi pada data produk !');
            } else {
                $category->delete();
                return redirect()->back()->with('success', 'Category deleted successfully!');
            }
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage());
        }
    }
}
