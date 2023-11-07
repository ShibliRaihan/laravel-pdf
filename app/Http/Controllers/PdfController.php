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
        // session()->put('payment', $req->payment);
        // session()->put('shopping', $req->shopping);
        // session()->put('name', $req->name);
        // session()->put('cel', $req->cel);
        // session()->put('addresh', $req->addresh);
        // session()->put('discount', $req->discount);
        // session()->put('shipping', $req->shipping);
        // session()->put('bkash', $req->bkash);

        // $data = [
        //     'payment' => session()->get('payment'),
        //     'shopping' => session()->get('shopping'),
        //     'transfer' => Str::random(10),
        //     'cel' => session()->get('cel'),
        //     'addresh' => session()->get('addresh'),
        //     'name' => session()->get('name'),
        //     'date' => Carbon::now()->format('Y-m-d'),
        //     'invoice' => ucwords(Str::random(8)),
        //     'products' => session()->get('p_arr')
        // ];
        // $pdf = PDF::loadView('receipt', $data);
        // $pdf->setPaper('A4', 'portrait');
        // $content = $pdf->download('home.pdf');
        


        $sheetName = 'laravel-sheet';
        $dataSheet = [
            'Customer_Name' => $req->payment,
            'Mobile' => $req->shopping,
            'Delivery Sent' => $req->name,
            'Addresh' => $req->address,
            'Order order confirmation DATE' => $req->shipping,
            'Pre Order ID' => $req->discount,
            'Delivered by' => $req->bkash,
        ];
        // 'Product Name' => $req->,

        // Get the Google Sheets instance
        $sheets = Sheets::spreadsheet('15YBkUbGLHG0vpjve98frvvKVtCFZl2uacTD0wymO0_M');

        // Fetch all rows from the sheet
        $rows = $sheets->sheet($sheetName)->all();

        // If there are rows, get the headers from the first row
        $headers = [];
        if (!empty($rows)) {
            $headers = $rows[0];
        }

        // Create an empty row to store the data
        $rowData = array_fill(0, count($headers), '');

        // Map the data to the corresponding column index
        foreach ($dataSheet as $columnName => $value) {
            $columnIndex = array_search($columnName, $headers);
            if ($columnIndex !== false) {
                $rowData[$columnIndex] = $value;
            }
        }

        // Append the row to the sheet
        if ($sheets->sheet($sheetName)->append([$rowData])) {
            dd("add");
        } else {
            dd("add not");
        }
        // return $content;
        // return view('receipt', $dataSheet);
    }

   public function googleSheet()
   {

   }

    public function store(Request $req){

        session()->put('p_arr',$req->p_arr);

        return session()->get('p_arr');
    }


}
