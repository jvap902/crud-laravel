<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    var $pessoas = [
        ['id' => '1', 'nome' => 'Thyago', 'sobrenome' => 'Salvá'],
        ['id' => '2', 'nome' => 'João Vitor', 'sobrenome' => 'Pereira']
    ];

    function index (){
        foreach($this->pessoas as $pessoa){
            print "<li>{$pessoa['nome']} {$pessoa['sobrenome']}</li>";
        }
        print "</ul>";
    }

    function show ($id){

        $p = [];
        foreach($this->pessoas as $pessoa){ //atualmente não faz nada por causa do break, mas sem ele faz a mesma coisa da de baixo
            if ($pessoa['id'] == $id){
                $p = $pessoa;
                break;
            }
        }

        $p = array_values(array_filter($this->pessoas,
            function($a) use ($id){return $a['id'] == $id;}
        ));

        if (empty($p)){
            print "<b> Nenhuma pessoa encontrada com o id: {$id} </b>";
            die;
        }else{
            $p = $p[0];
        }

        print "<h1>Pessoa</h1>";
        print "<p> A pessoa com o id = $id é ";
        print "<label>{$p['nome']} {$p['sobrenome']}</label>";
    }
}