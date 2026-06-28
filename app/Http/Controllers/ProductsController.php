<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sections = sections::all();
        $products = products::all();
        return view('products.products', compact('sections', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Product_name_ar' => 'required|max:255',
            'Product_name_en' => 'required|max:255',
            'section_id' => 'required|exists:sections,id',
        ], [
            'Product_name_ar.required' => 'يرجي ادخال اسم المنتج بالعربي',
            'Product_name_en.required' => 'يرجي ادخال اسم المنتج بالانجليزي',
            'section_id.required' => 'يرجي تحديد القسم',
        ]);

        $product = new products([
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        $product->setTranslation('Product_name', 'ar', $request->Product_name_ar);
        $product->setTranslation('Product_name', 'en', $request->Product_name_en);
        $product->save();

        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'Product_name_ar' => 'required|max:255',
            'Product_name_en' => 'required|max:255',
            'section_id' => 'required|exists:sections,id',
        ], [
            'Product_name_ar.required' => 'يرجي ادخال اسم المنتج بالعربي',
            'Product_name_en.required' => 'يرجي ادخال اسم المنتج بالانجليزي',
            'section_id.required' => 'يرجي تحديد القسم',
        ]);

        $product = products::findOrFail($request->pro_id);
        $product->setTranslation('Product_name', 'ar', $request->Product_name_ar);
        $product->setTranslation('Product_name', 'en', $request->Product_name_en);
        $product->description = $request->description;
        $product->section_id = $request->section_id;
        $product->save();

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Products = Products::findOrFail($request->pro_id);
        $Products->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();
    }
}
