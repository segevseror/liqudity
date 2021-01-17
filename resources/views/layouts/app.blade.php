<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <style>
    </style>
</head>

<body>
    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="../js/app.js"></script>
</body>

</html>