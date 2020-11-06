<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - EspecializaTi</title>

    @stack('styles')
</head>
<body>
    <div class="container">
        {{-- @yield() - Em uma view que extende essa, determina que o que estiver dentro de um '@section()' de mesmo nome
        substituirá esta linha --}}
        @yield('content')
    </div>


    {{--É substituido pelo conteudo presente em um @push de mesmo nome--}}
    @stack('scripts')
</body>
</html>
