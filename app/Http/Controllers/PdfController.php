<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PdfController extends Controller
{
    public function index(){
        session()->forget('p_arr');
        return view('welcome');
    }
    public function getpdf(Request $req){
        // dd($req->all());
        session()->put('payment', $req->payment);
        session()->put('shopping', $req->shopping);
        session()->put('name', $req->name);
        session()->put('cel', $req->cel);
        session()->put('addresh', $req->addresh);
        session()->put('discount', $req->discount);
        session()->put('shipping', $req->shipping);
        session()->put('bkash', $req->bkash);

        $data = [
            'payment' => session()->get('payment'),
            'shopping' => session()->get('shopping'),
            'transfer' => Str::random(10),
            'cel' => session()->get('cel'),
            'addresh' => session()->get('addresh'),
            'name' => session()->get('name'),
            'date' => Carbon::now()->format('Y-m-d'),
            'invoice' => ucwords(Str::random(8)),
            'products' => session()->get('p_arr')
        ];
        // $pdf = PDF::loadView('receipt', $data);
        // $pdf->setPaper('A4', 'portrait');
        // $content = $pdf->download('home.pdf');
        // return $content;

        return view('receipt', $data);
    }

    public function store(Request $req){

        session()->put('p_arr',$req->p_arr);

        return session()->get('p_arr');
    }


}
