<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeDarkModeController;
use App\Http\Controllers\ChangeSidebarStateController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\DesignatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function(){
    // Route::get('/', function () {
    //     return view('dashboard.index');
    // });
    
    // Route::get('/dashboard', function () {
    //     return view('dashboard.index');
    // })->name('dashboard');

    // Route::get('/khs', function () {
    //     return view('khs.index');
    // });

    Route::controller(DesignatorController::class)->group(function () {
        Route::get('/khs/designator', 'read');
        // Route::get('/khs', 'read');
        // Route::get('/khs/create', 'showCreate');
    });

    Route::controller(KHSController::class)->group(function () {
        Route::get('/khs', 'read');
        Route::get('/khs/create', 'showCreate');
        Route::post('/khs/create', 'saveCreate');
        Route::get('/getSTO/{id}', 'getSTO');
        Route::get('/', 'dashboard');
    });
    
    Route::post('/changeDarkMode', [ChangeDarkModeController::class, 'store']); 
    Route::post('/changeSideBarState', [ChangeSidebarStateController::class, 'store']); 
});


// $table->string("designator");
// $table->string("deskripsi");
// $table->string("satuan");
// $table->integer("p5_material");
// $table->integer("p5_jasa");
// $table->integer("p10_material");
// $table->integer("p10_jasa");

// Route::get('/insert', function () {
//     $des = App\Models\Designator::all();
//     $return = "";
//     $return.= "Designator::insert([<br>";
//     foreach($des as $de){
//         $return.= "[";
//         $return.= "'designator' => '".$de->designator."', ";
//         $return.= "'deskripsi' => '".$de->deskripsi."', ";
//         $return.= "'satuan' => '".$de->satuan."', ";
//         $return.= "'p5_material' => '".$de->p5_material."', ";
//         $return.= "'p5_jasa' => '".$de->p5_jasa."', ";
//         $return.= "'p10_material' => '".$de->p10_material."', ";
//         $return.= "'p10_jasa' => '".$de->p10_jasa."', ";
//         $return.= "],<br>";
//     }
    
//     $return.= "]);";
//     return $return;
// });

require __DIR__.'/auth.php';
