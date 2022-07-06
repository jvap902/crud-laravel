<h2>Incluir livros</h2>
<form action='/livros/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{ $livro->id }}" name="id"/>
    <div>
        <label>Título</label>
        <input type='text' value="{{ $livro->titulo }}" name='titulo'/>
    </div>
    <div>
        <label>Autor</label>
        <input type='text' value="{{ $livro->autor }}" name='autor'/>
    </div>
    <div>
        <button type='submit'>Enviar</button>
    </div>
</form>

