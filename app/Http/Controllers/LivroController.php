<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    function index() {

        $livros = DB::select('select * from livros;');

        return view('livros.index', ['livros' => $livros]);
    }

    function create () {
        return view('livros.create');
    }

    function show ($id) {
        $livros = DB::select("SELECT * FROM livros where id = :id", [$id]);

        return view('livros.show', ['livro' => $livros[0]]);
    }

    function store (Request $request) {
        $data = $request->all();

        DB::insert("INSERT INTO livros(titulo, autor) values(:titulo, :autor);",
        [
            'titulo' => $data['titulo'],
            'autor' => $data['autor']
        ]);

        return redirect('/livros');
    }

    function edit($id){
        $livros = DB::select("SELECT * FROM livros where id = :id", [$id]);

        return view('livros.edit', ['livro' => $livros[0]]);
    }

    function update(Request $request){
        $data = $request->all();
        DB::update("UPDATE livros SET titulo = :titulo, autor = :autor WHERE id = :id", [
            'id' => $data['id'],
            'titulo' => $data['titulo'],
            'autor' => $data['autor']
        ]);

        return redirect('/livros');
    }

    function destroy($id){
        DB::delete("DELETE FROM livros WHERE id = ?", [$id]);

        return redirect('/livros');
    }
}
