<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function cadastro_contato()
    {
        return view("contatos.criar_contato");
    }

    public function cadastramento_contato(ContatoRequest $dados)
    {
        $dados->validated();

        $contato = new Contato();

        $contato->nome = $dados->nome;
        $contato->contato = $dados->contato;
        $contato->email = $dados->email;

        $contato->save();

        return redirect()->route("buscar.contatos");
    }

    public function contatos()
    {
        $registros_contatos = Contato::orderby("id","asc")->paginate();
        return view("contatos.index",["contatos"=>$registros_contatos]);
    }

    public function visualizacao($codigo_contato)
    {
        $registro_localizado = Contato::find($codigo_contato);
        return view("contatos.visualizar_contato",["contato"=>$registro_localizado]);
    }

    public function exibir_edicao($codigo_pessoa)
    {
        $registro_localizado = Contato::find($codigo_pessoa);
        return view("contatos.editar",["contato"=>$registro_localizado]);
    }

    public function edita(ContatoRequest $dados,$codigo_contato)
    {
        $dados->validated();

        $registro_localizado = Contato::find($codigo_contato);

        $registro_localizado->nome = $dados->nome;
        $registro_localizado->contato = $dados->contato;
        $registro_localizado->email = $dados->email;

        $registro_localizado->save();    
        //return redirect()->route("pessoa.cadastro")->with("sucesso","Pessoa cadastrada com sucesso");    
        return redirect()->route("buscar.contatos");
    }

    public function exibir_modal_delecao($codigo_contato)
    {
        $registros_contatos = Contato::orderby('id', 'asc')->paginate();
        return view('contatos.index', ['contatos' => $registros_contatos, 'codigo_recebido' => $codigo_contato]);
    }

    public function exclusao_contato($codigo_contato)
    {
        $registro_localizado = Contato::find($codigo_contato);
        $registro_localizado->delete();
        return redirect()->route('buscar.contatos');
    }
}
