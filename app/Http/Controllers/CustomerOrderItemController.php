<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecustomer_order_itemRequest;
use App\Http\Requests\Updatecustomer_order_itemRequest;
use App\Models\customer_order_item;

class CustomerOrderItemController extends Controller
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
    public function store(Storecustomer_order_itemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(customer_order_item $customer_order_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer_order_item $customer_order_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecustomer_order_itemRequest $request, customer_order_item $customer_order_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer_order_item $customer_order_item)
    {
        //
    }
}
