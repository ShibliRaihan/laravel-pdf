<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .antialiased {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            padding-top: 6px;
        }
        .btn {
            width: 100%
        }
        
    </style>

    <!-- Add this in the <head> section of your HTML document -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>
<body class="antialiased">
    <br><br>
    <h2 class="text-center text-uppercase p-2">Skin Care Bangladesh</h2>
    <form class="flex" id="product_form">
        <div id="product" class="flex">
            <label class="label" for="name" >Product Name</label>
            <input class="form-control" type="text" placeholder="Enter product name" id="name">
            <label class="label" for="desc">Description</label>
            <input class="form-control" type="text" placeholder="Enter product Description" id="desc">
            <label class="label" for="qty">Qty</label>
            <input class="form-control" type="number" placeholder="Enter product qty" id="qty">
            <label class="label" for="price">Price</label>
            <input class="form-control" type="number" placeholder="Enter product price" id="price">
        </div>
        
        <div id="details_product" class="mt-3">

        </div>

        <button class="addNew btn btn-dark w-full mt-2">Add more</button>
        <button type="submit" style="display: none">Submit</button>
    </form>
    <br><br>
    
    <form action="{{ route('data') }}" method="get" class="flex">
        @csrf
        <label class="label" for="payment">Payment</label>
        <input class="form-control"  placeholder="Enter payment number" type="text" name="payment">
        <label class="label" for="shopping">Shopping Via</label>
        <input class="form-control"  placeholder="Enter Shopping via name" type="text" name="shopping">
        <label class="label" for="name">Customer name</label>
        <input class="form-control"  placeholder="Enter customer name" type="text" name="name">
        <label class="label" for="cel">Cell Phone</label>
        <input class="form-control"  placeholder="Enter cell phone" type="number" name="cel">
        <label class="label" for="address">Address</label>
        <input class="form-control"  placeholder="Enter customer address " type="text" name="address">
        <label class="label" for="shipping">Shipping</label>
        <input class="form-control"  placeholder="Enter Shipping charge" type="number" name="shipping">

        <label class="label" for="discount">Discount</label>
        <input class="form-control"  placeholder="Enter discount amount" type="number" name="discount">

        <label class="label" for="bkash">Bkash</label>
        <input class="form-control"  placeholder="Advance payment amount" type="number" name="bkash">

        <button class="submitBoth btn btn-success mt-3" onclick="submitBothForms()">Download pdf file</button>

    </form>

    <br><br><br>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    var p_arr = { name: [], desc: [], qty: [], price: [] };
    
    $('.addNew').on('click', function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var desc = $('#desc').val();
        var qty = $('#qty').val();
        var price = $('#price').val();

        if (name.length !== 0) {
            console.log(name);
            p_arr.name.push(name);
            p_arr.desc.push(desc);
            p_arr.qty.push(qty);
            p_arr.price.push(price);

            $('#name, #desc, #qty, #price').val(''); // Clear input class="form-control" fields
            $('#details_product').append(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>${name} - ${price}Tk</strong> added to product list
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`);
        }
    });


    // Remove item when a .removeItem button is clicked using event delegation
    $('#details_product').on('click', '.btn-close', function(e) {
        var index = $(this).parent().index(); // Get the index of the <p> element
        // Remove the item from the arrays
        p_arr.name.splice(index, 1);
        p_arr.desc.splice(index, 1);
        p_arr.qty.splice(index, 1);
        p_arr.price.splice(index, 1);
        // Remove the <p> element
        $(this).parent().remove();
    });

    function store(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('store') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            data: { p_arr: p_arr },
            success: function(response) {
                console.log('Success');
            }
        });
    }

    function submitBothForms() {
        // Trigger the submission of both forms
        $('#product_form').submit();
        $('#payment_form').submit();
    }

    $('#product_form').on('submit', store);
</script>

    
</html>
