<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Laradash Admin Panel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/laradash/css/laradash.css')}}">
    @yield('head')
</head>
<body>
    <div id="app">
        @include('laradash.theme.component.sidebar')
        <div id="main">
            @include('laradash.theme.component.navbar')
            @yield('content')
        </div>
    </div>
    <script src="{{url('/js/app.js')}}"></script>
    @include('laradash.theme.component.scripts')
    @yield('scripts')
</body>
</html>