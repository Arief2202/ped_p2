<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKHSRequest;
use App\Http\Requests\UpdateKHSRequest;
use App\Models\KHS;
use App\Models\sto;
use App\Models\witel;
use App\Models\Designator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Desigator;
use App\Models\KHSDesignator;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        $viewKHS = KHS::all();
        $designator = Designator::all();
        return view('khs.index', [
             'khs' => $viewKHS,
             'designators' => $designator,
        ]);
    }

    public function dashboard(){
        $viewKHS = KHS::all();
        $viewWitel = Witel::all();
        $viewKHSDesignator = KHSDesignator::all();
        return view('dashboard.index', [
              'witels' => $viewWitel,
              'khss' => $viewKHS,
              'khsd' => $viewKHSDesignator
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate(Request $request)
    {
        $witel = Witel::all();
        $sto = sto::where('witel_id', '=', $request->witel)->get();
        $designator = Designator::all();
        return view('khs.create', compact('witel', 'sto', 'designator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKHSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCreate(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            "witel_id" => "required",
            "sto_id" => "required",
            "id_project" => "required",
            "program_sap" => "required",
            "tematik" => "required",
            "nama_lop_feeder" => "required",
            "tahun" => "required",
            "status" => "required",
            "keterangan" => "",
            "kebutuhan" => ""
        ]);
        KHS::create($validated);
        return redirect('/khs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KHS  $kHS
     * @return \Illuminate\Http\Response
     */
    public function show(KHS $kHS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KHS  $kHS
     * @return \Illuminate\Http\Response
     */
    public function edit(KHS $kHS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKHSRequest  $request
     * @param  \App\Models\KHS  $kHS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKHSRequest $request, KHS $kHS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KHS  $kHS
     * @return \Illuminate\Http\Response
     */
    public function destroy(KHS $kHS)
    {
        //
    }

    public function getSTO($id)
    {
        $witel = Witel::where('witel_id',$id)->get();
        dd($request);
        return response()->json($witel);
    }
}
