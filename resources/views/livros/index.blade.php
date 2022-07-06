<div>
    <a href="/livros/create"><button>Incluir Livro</button></a>
</div>
@if (count($livros) == 0)
    Nenhum livro encontrado
@else
    Total de livros: {{ count($livros) }}

    <table>
        <tr>
            <th>título</th>
            <th>autor</th>
            <th>ações</th>
        </tr>
        @foreach ($livros as $livro)
        <tr>
            <td> {{ $livro->titulo }} </td>
            <td> {{ $livro->autor }} </td>
            <td>
                <a href="/livros/edit/{{ $livro->id }}"><button>Alterar</button></a>
                <a href="/livros/show/{{ $livro->id }}"><button>Ver</button></a>
                <a href="/livros/destroy/{{ $livro->id }}"><button>Remover</button></a>
            </td>
        </tr>
        @endforeach
    </table>
@endif


<style>
    table, th, td{
    border: 1px solid;
    padding: 2px;
}
