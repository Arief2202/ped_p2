<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChangeDarkModeController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('email', 'like', $request->email)->first();
        $user->darkMode = $request->darkMode;
        $user->save();
    }
}
