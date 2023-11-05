<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <form action="{{ route('data') }}" method="get">
        @csrf
        <input type="text" name="payment">
        <input type="submit" value="submit">
    </form>
</body>

</html>
