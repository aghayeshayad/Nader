<!DOCTYPE html>
<html class="no-js" lang="ar">
@section('style')
    <head>

        <title>
            @hasSection('title')
                @yield('title')
            @endif
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('meta_description')
        @yield('meta_description')
    @endif
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <link rel="manifest" href="https://kacharit.ir">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">


    </head>
@show

<body>
<header>

</header>
<main>
    @yield('content')
</main>
<footer>

</footer>


</body>
</html>
