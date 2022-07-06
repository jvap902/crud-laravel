<div>
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
@endif


<style>
    table, th, td{
    border: 1px solid;
    padding: 2px;
}
