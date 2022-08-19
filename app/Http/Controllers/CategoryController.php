<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      /**
     * Get all tags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        $categories = Category::select('id', 'name', 'image', 'updated_at')->paginate($pagination);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Create Category Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.categories.create');
    }

    /**
     * Create Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,except,id|string|max:35'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        // Return with success message
        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    /**
     * Edit Category Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $category)
    {
        $category = Category::select('id', 'name')->findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,except,id|string|max:35'
        ]);
        
        $category = Category::findOrFail($category);
        $category->update([
            'name' => $request->name
        ]);
        
        // Return with success message
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Delete Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $category)
    {
        $category = Category::findOrFail($category);
        $category->delete();

        // Return with success message
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
