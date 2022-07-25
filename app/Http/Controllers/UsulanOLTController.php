<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsulanOLT;

class UsulanOLTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return view('usulan_olt.index', [
            'usulan_olts' => UsulanOLT::all(),
        ]);
    }
}
