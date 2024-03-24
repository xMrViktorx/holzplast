<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::whereNull('parent_category_id')->get();
        return view('admin::category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'status' => 'boolean',
            'parent_category_id' => 'nullable',
        ]);

        Category::create($validated);
        return redirect()->route('admin.category.index')->with('success', 'Kategória sikeresen létrehozva!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if ($category) {
            $categories = Category::whereNull('parent_category_id')->where('id', '!=', $id)->get();
            return view('admin::category.edit', compact('category', 'categories'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back();
        }

        $validated = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'status' => 'boolean',
            'parent_category_id' => 'nullable',
        ]);

        if (!isset($validated['status'])) {
            $validated['status'] = 0;
        }

        $category->update($validated);

        return redirect()->back()->with('success', 'Kategória sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back();
        }

        $category->delete();
        return redirect()->back()->with('success', 'Kategória sikeresen törölve!');
    }
}
