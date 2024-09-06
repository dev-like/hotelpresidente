<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Mail;

class mail5Controller extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function post(Request $req)
    {
        $req->validate([
        'nome' => 'required',
        'email' => 'required',
        'mensagem' => 'required',
      ]);
        $data = [
        'nome' => $req->nome,
        'email' => $req->email,
        'mensagem' => $req->mensagem,
      ];

        Mail::send('mail.mail5', $data, function ($mensagem) use ($data) {
            $empresa = Empresa::find(1);

            $mensagem->from($data['email']);
            $mensagem->to($empresa->email, 'Mensagem SITE.');
            $mensagem->subject('Mensagem através do SITE.');

        });

        return redirect()->back()->with('alert2', 'Mensagem enviado !');
    }
}
