<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
        function index (){

        // $pessoas = DB::select('select * from pessoas;');

        $pessoas = DB::table('pessoas')
        ->select()
        ->addSelect(DB::raw("floor(datediff(now(), dtnasc)/365) as idade"))
        ->orderBy('nome')
        ->get();
        // ->selectRaw("id, nome, sobrenome, floor(datediff(now(), dtnasc)/365) as idade")

        return view('pessoas.index', ['pessoas' => $pessoas]);

        // foreach($this->pessoas as $pessoa){
        //     print "<li>{$pessoa['nome']} {$pessoa['sobrenome']}</li>";
        // }
        // print "</ul>";
    }

    function show ($id){
        $pessoas = DB::table('pessoas')
        ->selectRaw("id, nome, sobrenome, date_format(dtnasc, '%d/%m/%Y') as dataformatada, floor(datediff(now(),dtnasc)/365) as idade")->find($id);

        return view('pessoas.show', ['pessoa' => $pessoas]);
    }

    function create (){
        return view('pessoas.create');
    }

    function store (Request $request){
        $data = $request->all();
        unset($data['_token']);

        DB::table('pessoas')->insert($data);

        // DB::insert("INSERT INTO pessoas(nome, sobrenome, dtnasc) values(:nome, :sobrenome, :dtnasc);",
        // [
        //     'nome' => $data['nome'],
        //     'sobrenome' => $data['sobrenome'],
        //     'dtnasc' =>$data['dtnasc']
        // ]);

        return redirect('/pessoas');
    }

    function edit($id){
        // $pessoa = DB::select("SELECT * FROM pessoas WHERE id = ?", [$id]);
        // return view('pessoas.edit', ['pessoa' => $pessoa][0]);

        $pessoa = DB::table('pessoas')->find($id);

        return view('pessoas.edit', ['pessoa' => $pessoa]);
    }

    function update (Request $request) {
        $data = $request->all();
        DB::update("UPDATE pessoas SET nome = :nome, sobrenome = :sobrenome, dtnasc = :dtnasc WHERE id = :id;",
        [
            'id' => $data['id'],
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'dtnasc' => $data['dtnasc']
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
