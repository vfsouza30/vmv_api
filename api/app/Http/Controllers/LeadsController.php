<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Http\Requests\StoreLeadsRequest;
use App\Http\Requests\UpdateLeadsRequest;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Leads $leads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadsRequest $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leads $leads)
    {
        //
    }
}
