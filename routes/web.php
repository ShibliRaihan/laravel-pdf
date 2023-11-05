<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
})->name('data');

Route::get('/pdf', function (Request $req) {
    session()->put('payment', $req->payment);
    $data = [
        'payment'=> session()->get('payment'),
        'date' => Carbon::now()->format('Y-m-d'),
        'invoice' =>  ucwords(Str::random(8)),
    ];
    $pdf = PDF::loadView('receipt', $data);
    $pdf->setPaper('A4', 'portrait');
    $content = $pdf->download('home.pdf');
    return $content;
})->name('data');


// return view('receipt', $data);
// $content = $pdf->output();
// Route::get('/paper', function () {
    
//     // $html = view('receipt');
//     $pdf = PDF::loadView('receipt');
//     $content = $pdf->download('home.pdf');
//     return $content;
// })->name('');
