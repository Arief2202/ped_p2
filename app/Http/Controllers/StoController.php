<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorestoRequest;
use App\Http\Requests\UpdatestoRequest;
use App\Models\sto;

class StoController extends Controller
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
     * @param  \App\Http\Requests\StorestoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sto  $sto
     * @return \Illuminate\Http\Response
     */
    public function show(sto $sto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sto  $sto
     * @return \Illuminate\Http\Response
     */
    public function edit(sto $sto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestoRequest  $request
     * @param  \App\Models\sto  $sto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestoRequest $request, sto $sto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sto  $sto
     * @return \Illuminate\Http\Response
     */
    public function destroy(sto $sto)
    {
        //
    }
}
