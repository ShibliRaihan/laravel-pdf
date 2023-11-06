<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skin Care Bangladesh</title>
</head>
<style>
    *{
        margin: 0px;padding: 0px;box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

</style>
<body style="font-family: sans-serif">

    {{-- @if(!empty($products))
        @foreach ($products as $deds)
            @foreach ($deds as $i)
                {{$i}}
            @endforeach
        @endforeach
    @endif --}}
    <div style="margin: auto; width: 90% !important;">
        <hr style="background-color: #7c362d; height: 10px;" />
        <div style="width: 90% !important; margin: auto; margin-top: 10px;">
            <table width="100%">
                <tr>
                    <td style="text-align: left; width: 50%;">
                        <h1 style="font-size: 28px; font-weight: bold;">Skin Care Bangladesh</h1>
                        <p >Shop-24 Level-4</p>
                        <p >Karmphul Garden City</p>
                        <p >Santinogor, Kakrail, Dhaka</p>
                        <p >Hotline-09602111145</p>
                    </td>
                    <td style="text-align: right; width: 50%;">
                        <img src="https://i.ibb.co/Yp3qvFc/logo.png" alt="" style="width: 160px;" />
                    </td>
                </tr>
            </table>
            <h1 style="font-size: 35px; font-weight: medium; text-align: left;">Pre-Order</h1>
            <table width="100%">
                <tr>
                    <td style="font-weight: medium; font-size: 18px;">Date</td>
                    <td >{{ $date ?? '-' }}</td>
                    <td style="font-weight: medium; font-size: 18px;">ESTIMATED DELIVERY</td>
                    <td >{{ $date ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: medium; font-size: 18px;">Invoice</td>
                    <td >{{ $invoice ?? '-' }}</td>
                    <td style="font-weight: medium; font-size: 18px;">Shopping via</td>
                    <td >{{ $shopping ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: medium; font-size: 18px;">Payment</td>
                    <td >{{ $payment ?? '-' }}</td>
                    <td style="font-weight: medium; font-size: 18px;">Transfer ID</td>
                    <td >{{ $transfer }}</td>
                </tr>
            </table>
            <hr style="margin-top: 10px;" />
            <h2 style="font-size: 20px; margin-top: 10px;">{{ $name }}</h2>
            <p style="margin-top: 5px; font-size: 19px;">Cel - 88{{ $cel }}</p>
            <p >{{ $addresh }}</p>
            <p>Bangladesh</p>
            <br>
            <table width="100%">
                <thead>
                <tr>
                    <td style="font-weight: bold; font-size: 17px; color: blue;">Item Name</td>
                    <td style="font-weight: bold; font-size: 17px; color: blue;">Description</td>
                    <td style="font-weight: bold; font-size: 17px; color: blue;">Qty</td>
                    <td style="font-weight: bold; font-size: 17px; color: blue;">Unit Price</td>
                    <td style="font-weight: bold; font-size: 17px; color: blue;">Total Price</td>
                </tr>
                </thead>
                <tbody>
                @if(!empty($products))
                        @php
                            $subtotal = 0
                        @endphp
                        @foreach($products['name'] as $index => $name)
                            <tr>
                                <td>{{ $name }}</td>
                                <td>{{ $products['desc'][$index] }}</td>
                                <td>{{ $products['qty'][$index] }}</td>
                                <td>{{ $products['price'][$index] }}</td>
                                <td> {{ number_format($products['price'][$index]) * number_format($products['qty'][$index]) }} </td>
                            </tr>
                            @php
                                
                               $subtotal = $subtotal + $products['qty'][$index] * $products['price'][$index];
                            @endphp
                        @endforeach
                @endif
                </tbody>
            </table> 
            <hr style="margin-top: 10px;" />
            @php
                $shipping = Session::has('shipping') ?  Session::get('shipping') : 0;
                $discount = Session::has('discount') ?  Session::get('discount') : 0;
                $bkash = Session::has('bkash') ?  Session::get('bkash') : 0;
                $withShiping =  $shipping  +  $subtotal;
                $withDiscount =  $withShiping  - $discount;
                $cashonDel = $withDiscount - $bkash;
            @endphp
            <p style="text-align: right; font-size: 16px;">Subtotal: {{  $subtotal }}Tk </p>
            <p style="text-align: right; font-size: 16px;">Shipping: 
                {{ $shipping  }}Tk
            </p>
            <p style="text-align: right; font-size: 16px;">With Shipping
                {{ $withShiping }}Tk
            </p>
            <p style="text-align: right; font-size: 16px;">Discount: 
                {{ $discount  }}Tk
            </p>
            <p style="text-align: right; font-size: 16px;">Grand Total: 
                {{ $withDiscount }}Tk
            </p>
            <p style="text-align: right; font-size: 16px;">Advance Payment: 
                {{ $bkash  }}Tk 
            </p>
            <br>
            <p style="text-align: right; font-size: 19px;">Cash On Delivery : TK - {{ $cashonDel }}Tk</p>
        </div>
    </div>
</body>

</html>
