<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skin Care Bangladesh</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            /* width: 90% !important; */
            margin: auto;
        }

        .bar {
            background-color: #7c362d;
            height: 10px;
        }

        .child-div {
            display: flex;
            justify-content: space-between;
        }

        .child-container {
            width: 90% !important;
            margin: auto;
            margin-top: 25px;
        }

        .logo {
            width: 200px;
        }

        .infos {
            font-size: 19px;
        }

        .title {
            font-size: 50px;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
        }

        .text-bold {
            font-weight: bold;
            font-size: 18px;
        }

        .m-top {
            margin-top: 10px;
        }

        .sm-data {
            margin-top: 10px;
        }

        .m-sm-top {
            margin-top: 5px;
        }

        .text-blue {
            color: blue;
        }

        .bg-color {
            background-color: #f3f3f3;
        }

        .p-1 {
            padding: 5px 20px;
        }

        .fotter {
            display: flex;
            justify-content: space-between;
        }

        .info-name {
            margin-right: 120px;
        }

        .info-name p {
            margin-bottom: 10px;
        }

        .info-value p {
            margin-bottom: 10px;

        }

        .lef {
            text-align: end;
        }
    </style>
</head>

<body>
    <div class="container">
        <hr class="bar" />
        <div class="child-container">
            <div class="child-div">
                <div class="info">
                    <h1 class="name">Skin Care Bangladesh</h1>
                    <p class="infos">Shop-24 Level-4</p>
                    <p class="infos">Karmphul Garden City</p>
                    <p class="infos">Santinogor, Kakrail, Dhaka</p>
                    <p class="infos">Hotilne-09602111145</p>
                </div>
                <div class="logo-div">
                    <img class="logo" src="https://i.ibb.co/Yp3qvFc/logo.png" alt="" srcset="">
                </div>
            </div>
            <h1 class="title">Pre-Order</h1>
            <div class="invoice-info">
                <div class="info-first">
                    <p class="text-bold m-top">Date</p>
                    <p class="sm-data">{{ $date }}</p>
                    <p class="text-bold m-top">ESTIMATED DELEVERY</p>
                    <p class="sm-data">{{ $date }}</p>
                </div>
                <div class="info-sec">
                    <p class="text-bold m-top">Invoice</p>
                    <p class="sm-data">{{ $invoice  }}</p>
                    <p class="text-bold m-top">Shoping via</p>
                    <p class="sm-data">Shibli_Raihan</p>
                </div>
                <div class="info-third">
                    <p class="text-bold m-top">Payment</p>
                    <p class="sm-data">{{ $payment ?? "no data" }}</p>
                    <p class="text-bold m-top">Transfer ID</p>
                    <p class="sm-data">AJ6349</p>
                </div>
            </div>
            <hr class="m-top" />
            <h1 class="m-top">Shibli Raihan</h1>
            <p class="m-sm-top">Cel - 8801 813640562</p>
            <p class="m-sm-top">joyag,Sonalimuri,Noakhali</p>
            <p class="m-sm-top">Bangladesh</p>
            <div class="invoice-info m-top">
                <p class="text-bold text-blue">#Item</p>
                <p class="text-bold text-blue">Description</p>
                <p class="text-bold text-blue">Qty</p>
                <p class="text-bold text-blue">Unit Price</p>
                <p class="text-bold text-blue">Total Price</p>
            </div>
            <div class="invoice-info p-1 bg-color">
                <p class="">erte</p>
                <p class="">sdfs</p>
                <p class="">ggsdg</p>
                <p class="">tk-354435</p>
                <p class="">tk-67867</p>
            </div>
            <div class="invoice-info p-1 bg-color">
                <p class="">erte</p>
                <p class="">sdfs</p>
                <p class="">ggsdg</p>
                <p class="">tk-354435</p>
                <p class="">tk-67867</p>
            </div>
            <hr class="m-top" />
            <div class="fotter">
                <div></div>
                <div class="fotter">
                    <div class="info-name">
                        <p class="text-blue">Subltotal</p>
                        <p class="text-blue">Shiping handling</p>
                        <p class="text-blue">Discount</p>
                        <p class="text-blue">Totoal</p>
                        <p class="text-blue">Bkash Payment</p>
                    </div>
                    <div class="info-value">
                        <p>2324</p>
                        <p>3456</p>
                        <p>67867</p>
                        <p>34589</p>
                        <p>34589</p>
                    </div>
                </div>
            </div>
            <hr />
            <h4 class="lef">Cash On Delivery : TK - 45965409</h4>
        </div>
    </div>
</body>

</html>
