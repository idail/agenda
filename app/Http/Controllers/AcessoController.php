<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Contato;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function login()
    {
        return view("acesso.autenticacao");
    }

    public function autenticar(UsuarioRequest $solicitacao_autenticar)
    {
        if (session()->has("nome_usuario")) {
            $registros_contatos = Contato::orderby("id", "asc")->paginate();
            return view("contatos.index", ["contatos" => $registros_contatos]);
        } else {
            $solicitacao_autenticar->validated();
            //$senha_criptografada = bcrypt($solicitacao_autenticar->senha_acesso);
            $recebe_usuario = $solicitacao_autenticar->nome_acesso;
            $recebe_senha = $solicitacao_autenticar->senha_acesso;

            $usuario = Usuario::where("usuario", "=", $recebe_usuario)->where("senha", "=", $recebe_senha)->first();
            if ($usuario) {
                session()->put("nome_usuario", $usuario->nome);
                $registros_contatos = Contato::orderby("id", "asc")->paginate();
                return view("contatos.index", ["contatos" => $registros_contatos]);
            } else {
                session()->flash("dados_errados", "Favor verificar os dados para acesso");
                return redirect()->back();
            }
        }
    }
}
