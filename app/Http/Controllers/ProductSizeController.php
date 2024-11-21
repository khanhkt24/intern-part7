<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productSizes = ProductSize::query()->get();
        return view('admin.productsizes.index', compact('productSizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productsizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductSizeRequest $request)
    {
        $productSizes = ProductSize::create($request->all());
        return redirect()->route('productsize.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productSize = ProductSize::find($id);
        return view('admin.productsizes.edit', compact('productSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductSizeRequest $request, $id)
    {
        $productSize = ProductSize::find($id);
        $productSize->update([
            'name' => $request->name
        ]);
        return redirect()->route('productsize.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productSizes = ProductSize::find($id);
        // $variants = Variant::query()->where('product_size_id', $id)->first();
        // if ($variants) {
        //     return redirect()->route('productsize.index')->withErrors(['size_error' => 'Kích thước "' . $productSizes->name . '" đang được sử dụng không thể xóa']);
        // } else {
        //     $productSizes->delete();
            return redirect()->route('productsize.index');
        // }
    }
}
