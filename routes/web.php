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
    // dd($req->all());
    session()->put('payment', $req->payment);
    session()->put('shopping', $req->shopping);
    session()->put('transfer', $req->transfer);
    session()->put('name', $req->name);
    session()->put('cel', $req->cel);
    session()->put('addresh', $req->addresh);
    $data = [
        'payment' => session()->get('payment'),
        'shopping' => session()->get('shopping'),
        'transfer' => session()->get('transfer'),
        'cel' => session()->get('cel'),
        'addresh' => session()->get('addresh'),
        'name' => session()->get('name'),
        'date' => Carbon::now()->format('Y-m-d'),
        'invoice' => ucwords(Str::random(8)),
    ];
    // $pdf = PDF::loadView('receipt', $data);
    // $pdf->setPaper('A4', 'portrait');
    // $content = $pdf->download('home.pdf');
    // return $content;
    return view('receipt', $data);
})->name('data');

// $content = $pdf->output();
// Route::get('/paper', function () {

//     // $html = view('receipt');
//     $pdf = PDF::loadView('receipt');
//     $content = $pdf->download('home.pdf');
//     return $content;
// })->name('');
