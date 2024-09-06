<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Mail;

class mail4Controller extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function post(Request $req)
    {
        $req->validate([
        'nome' => 'required',
        'data' => 'required',
        'email' => 'required',
        'telefone' => 'required',
      ]);
        $data = [
        'nome' => $req->nome,
        'data' => $req->data,
        'email' => $req->email,
        'telefone' => $req->telefone,
      ];

        Mail::send('mail.mail4', $data, function ($mensagem) use ($data) {
            $empresa = Empresa::find(1);

            $mensagem->from($data['email']);
            $mensagem->to($empresa->email, 'Pedido de reserva AUDITÓRIO.');
            $mensagem->subject('Pedido de reserva AUDITÓRIO.');

        });

        return redirect()->back()->with('alert', 'Pedido de reserva efetuado !');
    }
}
