<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Product;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\ProductImage;
use Illuminate\Contracts\Support\Renderable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('admin::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'status' => 'boolean',
            'price' => 'numeric',
            'amount' => 'integer',
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $product = Product::create($validated);

        $imageName =  date('YmdHis') . $request->image->getClientOriginalName();

        $request->image->move('images/products/' . $product->id, $imageName);
        ProductImage::create(['path' => 'images/products/' . $product->id . '/' . $imageName, 'product_id' => $product->id]);

        return redirect()->route('admin.product.index')->with('success', 'Termék sikeresen létrehozva!');
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
        $product = Product::find($id);

        if ($product) {
            $categories = Category::all();
            return view('admin::product.edit', compact('product', 'categories'));
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
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back();
        }

        $validated = $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'slug' => 'required|unique:products,slug,' . $product->id,
            'description' => 'required',
            'status' => 'boolean',
            'price' => 'integer',
            'amount' => 'integer',
            'category_id' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if (!isset($validated['status'])) {
            $validated['status'] = 0;
        }

        $product->update($validated);

        if ($request->image) {

            $productImage = ProductImage::where('product_id', $id)->first();

            if ($productImage) {
                $imageName =  date('YmdHis') . $request->image->getClientOriginalName();

                //unlink($productImage->path);

                $request->image->move('images/products/' . $product->id, $imageName);

                $productImage->path = 'images/products/' . $id . '/' . $imageName;
                $productImage->save();
            }
        }

        return redirect()->back()->with('success', 'Termék sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back();
        }

        if ($product->productImage) {
            unlink($product->productImage->path);
        }

        $product->delete();
        return redirect()->back()->with('success', 'Termék sikeresen törölve!');
    }
}
