<h2>Incluir pessoas</h2>
<form action='/pessoas/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <div>
        <label>Nome</label>
        <input type='text' name='nome'/>
    </div>
    <div>
        <label>Sobrenome</label>
        <input type='text' name='sobrenome'/>
    </div>
    <div>
        <button type='submit'>Enviar</button>
    </div>
</form>

