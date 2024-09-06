<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Http\Requests\StorePessoasRequest;
use App\Http\Requests\UpdatePessoasRequest;

class PessoasController extends Controller
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
    public function store(StorePessoasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pessoas $pessoas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePessoasRequest $request, Pessoas $pessoas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoas $pessoas)
    {
        //
    }
}
