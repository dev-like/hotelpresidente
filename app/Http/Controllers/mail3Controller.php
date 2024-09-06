<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Mail;

class mail3Controller extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function post(Request $req)
    {
        $req->validate([
        'quartonome' => 'required',
        'valor' => 'required',
        'nome' => 'required',
        'checkin' => 'required',
        'checkout' => 'required',
        'email' => 'required',
        'telefone' => 'required',
      ]);
        $data = [
          'quartonome' => $req->quartonome,
          'valor' => $req->valor,
          'checkin' => $req->checkin,
          'checkout' => $req->checkout,
          'nome' => $req->nome ,
          'email' => $req->email ,
          'telefone' => $req->telefone ,
      ];

        Mail::send('mail.mail3', $data, function ($mensagem) use ($data) {
            $empresa = Empresa::find(1);

            $mensagem->from($data['email']);
            $mensagem->to($empresa->email, 'Pedido de reserva QUARTO.');
            $mensagem->subject('Pedido de reserva QUARTO.');

        });

        return redirect()->back()->with('alert', 'Pedido de reserva efetuado !');
    }
}
