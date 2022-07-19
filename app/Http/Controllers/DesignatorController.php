<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesignatorRequest;
use App\Http\Requests\UpdateDesignatorRequest;
use App\Models\Designator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return view('designator.index', [
            'designators' => Designator::all(),
        ]);
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
     * @param  \App\Http\Requests\StoreDesignatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesignatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designator  $designator
     * @return \Illuminate\Http\Response
     */
    public function show(Designator $designator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designator  $designator
     * @return \Illuminate\Http\Response
     */
    public function edit(Designator $designator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesignatorRequest  $request
     * @param  \App\Models\Designator  $designator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesignatorRequest $request, Designator $designator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designator  $designator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designator $designator)
    {
        //
    }
}
