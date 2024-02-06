<?php

namespace App\Http\Controllers;

use App\Models\Zakazky;
use Illuminate\Http\Request;

class ZakazkyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "kuk";
        echo (Zakazky::all());

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Zakazky $zakazky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zakazky $zakazky)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakazky $zakazky)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zakazky $zakazky)
    {
        //
    }
}
