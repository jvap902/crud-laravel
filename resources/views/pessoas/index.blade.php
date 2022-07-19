@extends('base.index')

@section('container')
<a class="btn btn-success" href="/pessoas/create">Incluir Pessoa</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pessoas as $pessoa)
            <tr>
                <td> {{ $pessoa->nome }} </td>
                <td> {{ $pessoa->sobrenome }} </td>
                <td>
                    <a class="btn btn-warning" href="/pessoas/edit/{{ $pessoa->id }}">Alterar</a>
                    <a class="btn btn-primary" href="/pessoas/show/{{ $pessoa->id }}">Ver</a>
                    <a class="btn btn-danger" href="/pessoas/destroy/{{ $pessoa->id }}">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

{{-- <div>
    <a href="/pessoas/create"><button>Incluir Pessoa</button></a>
</div>
@if (count($pessoas) == 0)
    Nenhum livro encontrado
@else
    Total de pessoas: {{ count($pessoas) }}

    <table>
        <tr>
            <th>nome</th>
            <th>sobrenome</th>
            <th>ações</th>
        </tr>
        @foreach ($pessoas as $pessoa)
        <tr>
            <td> {{ $pessoa->nome }} </td>
            <td> {{ $pessoa->sobrenome }} </td>
            <td>
                <a href="/pessoas/edit/{{ $pessoa->id }}"><button>Alterar</button></a>
                <a href="/pessoas/show/{{ $pessoa->id }}"><button>Ver</button></a>
                <a href="/pessoas/destroy/{{ $pessoa->id }}"><button>Remover</button></a>
            </td>
        </tr>
        @endforeach
    </table>
@endif --}}
