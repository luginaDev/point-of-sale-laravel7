<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addOrder()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('orders.add', compact('products'));
    }

    public function getProduct()
    {
        $product = Product::findOrFail($id);
         return response()->json($product, 200);
    }
    public function addToCart(Request $request)
    {
    $this->validate($request, [
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer'
    ]);
    $product = Product::findOrFail($request->product_id);
    $getCart = json_decode($request->cookie('cart'), true);
    if ($getCart) {
        if (array_key_exists($request->product_id, $getCart)) {
            $getCart[$request->product_id]['qty'] += $request->qty;
            return response()->json($getCart, 200)
                ->cookie('cart', json_encode($getCart), 120);
        } 
    }
    $getCart[$request->product_id] = [
        'code' => $product->code,
        'name' => $product->name,
        'price' => $product->price,
        'qty' => $request->qty
    ];
    return response()->json($getCart, 200)
        ->cookie('cart', json_encode($getCart), 120);
    }
public function getCart()
{
    $cart = json_decode(request()->cookie('cart'), true);
    return response()->json($cart, 200);
}
public function removeCart($id)
{
    $cart = json_decode(request()->cookie('cart'), true);
    unset($cart[$id]);
    return response()->json($cart, 200)->cookie('cart', json_encode($cart), 120);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
