<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Revolution\Google\Sheets\Facades\Sheets;

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
        session()->put('addresh', $req->address);
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
        $this->sheet();

        $pdf = PDF::loadView('receipt', $data);
        $pdf->setPaper('A4', 'portrait');
        $content = $pdf->download('home.pdf');
        return $content;
        // return view('receipt', $data);
    }

    public function store(Request $req){

        session()->put('p_arr',$req->p_arr);

        return session()->get('p_arr');
    }

    public function sheet() {
        $spreadsheetId = '1zModzelZwRE4Bf6cLHDES2AWrJ_FeKsBcKMwcPfp6UM';
        $sheetName = 'Sheet1'; // Replace with the name of your sheet
        $cellRange = 'A2'; // Replace with the desired cell range (e.g., A1)

        $payment = session()->get('payment');
        $shopping = session()->get('shopping');
        $name = session()->get('name');
        $cel = session()->get('cel');
        $addresh = session()->get('addresh');
        $discount = session()->get('discount');
        $bkash = session()->get('bkash',);
        $products = session()->get('p_arr');

        $parentRow = [
            $name,

        ];
        $productName = '';
        $productPrice = 0;
        foreach($products['name'] as $index => $name){
            $desc = $products['desc'][$index];
            $qty = $products['qty'][$index];
            $price = $products['price'][$index];
 
            $productName .=  $name.' pcs'.$qty.', ';
            $productPrice += $price * $qty;
            
        }
        $parentRow[] = $productName;
        $parentRow[] = $productPrice;
        $sheets = Sheets::spreadsheet($spreadsheetId);
        $sheet = $sheets->sheet($sheetName);

        $parentRow[] = $cel;
        $parentRow[] = $addresh;
        $parentRow[] = $bkash;

        // Set the value of the cell to your text
        $sheet->range($cellRange)->append([$parentRow]);

        return 'Text added to cell ' . $cellRange;
    }


}
