<h2>Incluir pessoas</h2>
<form action='/pessoas/update/' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{ $pessoa->id }}" name="id"/>
    <div>
        <label>Nome</label>
        <input type='text' value="{{ $pessoa->nome }}" name='nome'/>
    </div>
    <div>
        <label>Sobrenome</label>
        <input type='text' value="{{ $pessoa->sobrenome }}" name='sobrenome'/>
    </div>
    <div>
        <button type='submit'>Enviar</button>
    </div>
</form>

