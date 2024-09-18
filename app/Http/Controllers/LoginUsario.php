<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class LoginUsario extends Controller
{
    public $email;

    public $senha;

    public function Autenticar(Request $req): Response
    {
        $retorno = DB::table('users')->where(['email' =>  $req->txtEmail])->first();

        // $novoUsuario = User::all()
        if (! $retorno || ! Hash::check( $req->txtSenha, $retorno->password)) {
            return back()->with('error', ['mensagem' => 'EMAIL OU SENHA INCORRETA POR FAVOR REVISE AS CREDENCIAIS!!.', 'alert' => 'warning']);
        }

        $usuario = User::factory()->make(['email' => $retorno->email,'senha' => $retorno->password , 'name' => $retorno->name]);

        return $this->redirecionaDashBoardComParametros($req,$usuario);
    }

    public function Inicio(): View
    {
        $novo = new Alert('', '');

        return $novo->render();
    }

    public function redirecionaDashBoardComParametros(Request $req, User $usuario): Response
    {
        dd($usuario);
        // return redirect()->action('${App\Http\Controllers\HomeController@index}', ['parameterKey' => 'value']);
    }
}
