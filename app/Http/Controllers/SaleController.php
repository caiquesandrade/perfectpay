<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.index', compact('sales','products', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.create', compact('products', 'customers'));
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
            'quantity' => 'required',
            'status' => 'required'
        ]);

        $sale = Sale::create($request->all());

        return redirect('/sales')->with('success', 'Sale Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.edit', compact('sale', 'products', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productValidation = $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            'sale_amout' => 'required',
            'status' => 'required'
        ]);

        Sale::whereId($id)->update($productValidation);

        return redirect('/sales')->with('success', 'Sale Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect('/sales')->with('success', 'Sale Deleted !');
    }
}
