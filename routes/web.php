<?php

use App\Http\Controllers\PdfController;

use Illuminate\Support\Facades\Route;


Route::get('/', [PdfController::class, 'index'])->name('home');
Route::get('/pdf', [PdfController::class, 'getpdf'])->name('data');

Route::post('/store/product', [PdfController::class, 'store'])->name('store');
// $content = $pdf->output();
// Route::get('/paper', function () {

//     // $html = view('receipt');
//     $pdf = PDF::loadView('receipt');
//     $content = $pdf->download('home.pdf');
//     return $content;
// })->name('');
