<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecustomer_contactRequest;
use App\Http\Requests\Updatecustomer_contactRequest;
use App\Models\customer_contact;

class CustomerContactController extends Controller
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
    public function store(Storecustomer_contactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(customer_contact $customer_contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer_contact $customer_contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecustomer_contactRequest $request, customer_contact $customer_contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer_contact $customer_contact)
    {
        //
    }
}
