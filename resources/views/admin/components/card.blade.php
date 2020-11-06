<div class="card">
    <div class="card-header">
        {{--Imprime o slot recebido de nome "title"--}}
        {{ $title }}
    </div>a
    <div class="card-body">
        {{--Imprime o slot recebido pelo @component--}}
        {{ $slot }}
    </div>
</div>
