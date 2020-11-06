<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha View</title>
</head>
<body>
    Minha View

    {{--Imprime a variavel "$teste" que foi passada como parametro pelo controller, convertendo tudo em String--}}
    {{ $teste }}

    {{--Impreme a variavel $teste, distinguindo tags de string--}}
    {!! $teste !!}
</body>
</html>
