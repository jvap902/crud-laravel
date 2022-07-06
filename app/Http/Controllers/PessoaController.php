<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
        function index (){

        $pessoas = DB::select('select * from pessoas;');

        return view('pessoas.index', ['pessoas' => $pessoas]);

        // foreach($this->pessoas as $pessoa){
        //     print "<li>{$pessoa['nome']} {$pessoa['sobrenome']}</li>";
        // }
        // print "</ul>";
    }

    function show ($id){
        $pessoas = DB::select("SELECT * FROM pessoas WHERE id = :id;", [$id]);

        return view('pessoas.show', ['pessoa' => $pessoas[0]]);

    //     $p = [];
    //     foreach($this->pessoas as $pessoa){ //atualmente não faz nada por causa do break, mas sem ele faz a mesma coisa da de baixo
    //         if ($pessoa['id'] == $id){
    //             $p = $pessoa;
    //             break;
    //         }
    //     }

    //     $p = array_values(array_filter($this->pessoas,
    //         function($a) use ($id){return $a['id'] == $id;}
    //     ));

    //     if (empty($p)){
    //         print "<b> Nenhuma pessoa encontrada com o id: {$id} </b>";
    //         die;
    //     }else{
    //         $p = $p[0];
    //     }

    //     print "<h1>Pessoa</h1>";
    //     print "<p> A pessoa com o id = $id é ";
    //     print "<label>{$p['nome']} {$p['sobrenome']}</label>";
    }

    function create (){
        return view('pessoas.create');
    }

    function store (Request $request){
        $data = $request->all();

        DB::insert("INSERT INTO pessoas(nome, sobrenome) values(:nome, :sobrenome);",
        [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome']
        ]);


        // DB::table('pessoas')->insert([
        //     'nome' => $data['nome'],
        //     'sobrenome' => $data['sobrenome'],
        // ]);

        return redirect('/pessoas');
    }

    function edit($id){
        $pessoa = DB::select("SELECT * FROM pessoas WHERE id = ?", [$id]);
        return view('pessoas.edit', ['pessoa' => $pessoa[0]]);
    }

    function update (Request $request) {
        $data = $request->all();
        DB::update("UPDATE pessoas SET nome = :nome, sobrenome = :sobrenome WHERE id = :id;",
        [
            'id' => $data['id'],
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome']
        ]);

        // $data = $request->all();
        // unset($data['_token']);
        // DB::update("UPDATE pessoas SET nome = :nome, sobrenome = :sobrenome WHERE id = :id;", $data);

        return redirect('/pessoas');
    }

    function destroy($id){
        DB::delete("DELETE FROM pessoas WHERE id = ?", [$id]);

        return redirect ('/pessoas');
    }
}
