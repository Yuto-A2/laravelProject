<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("orders.index",[
            'orders' => Order::all(),
            'products' => Product::all(),
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Product::all();
        return view('orders.create', ['products' => $products, 'customers' => $customers]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        Order::create($request->validated());

        Session::flash('success', 'Order added successfully');
        return redirect() -> route("orders.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = Product::all();
        return view('orders.show', ['order' => $order, 'products' => $products]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect() -> route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id){
        Order::Destroy($id);
        Session::Flash('success', 'Order trashed successfully');
        return redirect() -> route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::withTrashed()->where("id", $id)->first();
        $order -> forceDelete();
        Session:Flash('success', 'Order deleted successfully');
        return redirect()->route(orders.index);
    }

    public function restore($id){
        $order = Order::withTrashed()->where('id', $id)->first();
        $order ->restore();
        Session::Flash('success', 'Order restored successfully');
        return redirect()->route('orders.trashed');
    }
}
