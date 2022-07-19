<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorewitelRequest;
use App\Http\Requests\UpdatewitelRequest;
use App\Models\witel;

class WitelController extends Controller
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
     * @param  \App\Http\Requests\StorewitelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewitelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\witel  $witel
     * @return \Illuminate\Http\Response
     */
    public function show(witel $witel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\witel  $witel
     * @return \Illuminate\Http\Response
     */
    public function edit(witel $witel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewitelRequest  $request
     * @param  \App\Models\witel  $witel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewitelRequest $request, witel $witel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\witel  $witel
     * @return \Illuminate\Http\Response
     */
    public function destroy(witel $witel)
    {
        //
    }
}
