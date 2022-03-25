<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::orderby('id','asc')->get()->toArray();
//        $products_data = response()->json($products);
//        dd($products_data);
        return response()->json($products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Product::create([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_price' =>$request->product_price,
            'product_sms' => $request->product_sms,
            'product_gift' => $request->product_gift,
            'off_price' => $request->off_price
        ]);
        return response()->json('product created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::where('id',$id)->update([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_price' =>$request->product_price,
            'product_sms' => $request->product_sms,
            'product_gift' => $request->product_gift,
            'off_price' => $request->off_price
        ]);
        return response()->json('product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('product deleted successfully');
    }
}
