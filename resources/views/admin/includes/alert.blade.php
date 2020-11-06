<div class="alert">
    {{--Imprime array passado ao chamar esse view atraves do @include--}}
    {{--?? - Caso a variavel "$content" não exista, executa a ação logo após os "??"--}}
    <p>Alert - {{ $content ?? '<DEFAULT>'}}</p>
</div>
