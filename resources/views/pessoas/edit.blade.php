@extends('base.index')

@section('container')
<form action='/pessoas/update/' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    @include('components.field', ['type' => 'hidden', 'name' => 'id', 'label' => '', 'value' => $pessoa->id ])
    @include('components.field', ['type' => 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => $pessoa->nome ])
    @include('components.field', ['type' => 'text', 'name' => 'sobrenome', 'label' => 'Sobrenome', 'value' => $pessoa->sobrenome ])
    @include('components.field', ['type' => 'date', 'name' => 'dtnasc', 'label' => 'Data de Nascimento', 'value' => $pessoa->dtnasc])
    <div>
        @include('components.button', ['type' => 'button', 'color' => 'danger', 'text' => 'Voltar'])
        @include('components.button', ['type' => 'submit', 'color' => 'success', 'text' => 'Enviar'])
    </div>
</form>
@endsection
