<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecustomer_orderRequest;
use App\Http\Requests\Updatecustomer_orderRequest;
use App\Models\customer_order;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storecustomer_orderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(customer_order $customer_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer_order $customer_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecustomer_orderRequest $request, customer_order $customer_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer_order $customer_order)
    {
        //
    }
}
