<h2>Incluir livros</h2>
<form action='/livros/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <div>
        <label>Título</label>
        <input type='text' name='titulo'/>
    </div>
    <div>
        <label>Autor</label>
        <input type='text' name='autor'/>
    </div>
    <div>
        <button type='submit'>Enviar</button>
    </div>
</form>
