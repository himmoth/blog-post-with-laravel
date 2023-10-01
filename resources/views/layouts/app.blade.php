<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <title>@yield('title','Home')</title>
</head>
<body>
   
    @include('partails.nav')

    <div class="container">
        @yield('content')
    </div>

   
  

    @include('partails.footer')

  
    
<script src="{{asset('js/bootstrap5.min.js')}}"></script>
<script defer src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>

</body>
</html>