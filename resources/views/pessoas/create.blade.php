@extends('base.index')

@section('container')
<form action='/pessoas/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    @include('components.field', ['type' => 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => ''])
    @include('components.field', ['type' => 'text', 'name' => 'sobrenome', 'label' => 'Sobrenome', 'value' => ''])
    <div class="mb-3">
        @include('components.button', ['type' => 'button', 'color' => 'danger', 'text' => 'Voltar'])
        @include('components.button', ['type' => 'submit', 'color' => 'success', 'text' => 'Enviar'])
    </div>
</form>
@endsection

