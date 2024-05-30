<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
        ->with('i',(request()->input('page',1) -1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'detail'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,gif,png,svg|max:2048'

        ]);
        $input=$request->all();
        if($image=$request->file('image'))
        {
            $destination_path='image/';
            //dd($image);
            //$profile_image=date('YmdHis') . "." . $image->getClientOrginalExtension();
            $profile_image=date('Ymdis') . "." .$image->getClientOriginalExtension();
            $image->move($destination_path,$profile_image);
            $input['image']="$profile_image";

        }
        Product::create($input);
        return redirect()->route('products.index')
        ->with('Success','the product is created in Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //dd($request);
      
        $input=$request->all();
        if($image=$request->file('image'))
        {
            $destination_path='image/';
            //dd($image);
            //$profile_image=date('YmdHis') . "." . $image->getClientOrginalExtension();
            $profile_image=date('Ymdis') . "." .$image->getClientOriginalExtension();
            $image->move($destination_path,$profile_image);
            $input['image']="$profile_image";

            $product->update($input);
        return redirect()->route('products.index')
        ->with('Success','the product is created in Successfully');

        }
        //dd($input);
        else{
                //dd($input);
            $product->update($input);
        return redirect()->route('products.index')
        ->with('Success','the product is created in Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','record successfully deleted');
        
    }
}
