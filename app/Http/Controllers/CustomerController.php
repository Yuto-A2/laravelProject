<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("customers.index",[
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());

        Session::flash('success', 'Customer added successfully');
        return redirect() -> route("customers.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view ('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect() -> route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id){
        Customer::Destroy($id);
        Session::Flash('success', 'Customer trashed successfully');
        return redirect() -> route('customers.index');
    }


    public function destroy($id)
    {
        $customer = Customer::withTrashed()->where("id", $id)->first();
        $customer -> forceDelete();
        Session:Flash('success', 'Customer deleted successfully');
        return redirect()->route(customers.index);
    }

    public function restore($id){
        $customer = Customer::withTrashed()->where('id', $id)->first();
        $customer ->restore();
        Session::Flash('success', 'Customer restored successfully');
        return redirect()->route('customers.trashed');
    }
}
