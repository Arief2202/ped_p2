<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKHSDesignatorRequest;
use App\Http\Requests\UpdateKHSDesignatorRequest;
use Illuminate\Http\Request;
use App\Models\KHSDesignator;
use App\Models\Desigator;
use App\Models\KHS;

class KHSDesignatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return view('KHSDesignator.read', [
            'KHSDesignator' => $viewKHSDesignator,
            'designator' => Designator::all(),
            'KHS' => KHS::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'jumlah' => ['request', 'float', 'max:255'],
            'totalmaterial'=> ['request', 'float', 'max:255'],
            'totaljasa'=> ['request', 'float', 'max:255'],
            'total'=> ['request', 'float', 'max:255'],
        ]);
        return view('KHSDesignator.read');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKHSDesignatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKHSDesignatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KHSDesignator  $kHSDesignator
     * @return \Illuminate\Http\Response
     */
    public function show(KHSDesignator $kHSDesignator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KHSDesignator  $kHSDesignator
     * @return \Illuminate\Http\Response
     */
    public function edit(KHSDesignator $kHSDesignator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKHSDesignatorRequest  $request
     * @param  \App\Models\KHSDesignator  $kHSDesignator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKHSDesignatorRequest $request, KHSDesignator $kHSDesignator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KHSDesignator  $kHSDesignator
     * @return \Illuminate\Http\Response
     */
    public function destroy(KHSDesignator $kHSDesignator)
    {
        //
    }
}
