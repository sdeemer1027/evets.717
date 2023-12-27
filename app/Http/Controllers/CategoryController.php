<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $category->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Category updated successfully');
    }





    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        Category::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Category created successfully');
    }
    // Add more category methods as needed
}
