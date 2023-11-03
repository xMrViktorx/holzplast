<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\Category;
use Illuminate\Contracts\Support\Renderable;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('shop::index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get all categories for the navbar.
     * @return Renderable
     */
    public static function getCategories()
    {
        $categories = Category::where('status', 1)->get();
        return $categories;
    }

    /**
     * Show product or category view. If neither category nor product matches, abort with code 404.
     *
     * @return \Illuminate\View\View|\Exception
     */
    public function getCategoryOrProduct(Request $request)
    {
        // Get the path info from the request and decode the URL
        $pathInfo = urldecode(trim($request->getPathInfo(), '/'));

        // Split the path into segments using the '/' delimiter
        $segments = explode('/', $pathInfo);

        // Get the last segment (slug)
        $slug = end($segments);

        $product = Product::where('slug', $slug)->first();

        if ($product) {
            return view('shop::product-details', compact('product'));
        }

        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $products = $category->products;
            return view('shop::category-overview', compact('products'));
        } else {
            abort(404);
        }

        return view('shop::details');
    }
}
