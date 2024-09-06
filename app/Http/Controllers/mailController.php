<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function index()
    {
        return view('pages/index');
    }

    public function post(Request $req)
    {
        $req->validate([
        'checkin' => 'required',
        'checkout' => 'required',
        'hospedes' => 'required',
        'quantquartos' => 'required',
        'nome' => 'required',
        'email' => 'required',
        'telefone' => 'required',
      ]);
        $data = [
          'checkin' => $req->checkin ,
          'checkout' => $req->checkout ,
          'hospedes' => $req->hospedes ,
          'quantquartos' => $req->quantquartos ,
          'nome' => $req->nome ,
          'email' => $req->email ,
          'telefone' => $req->telefone ,
      ];

        Mail::send('mail.mail', $data, function ($mensagem) use ($data) {
            $empresa = Empresa::find(1);

            $mensagem->from($data['email']);
            $mensagem->to($empresa->email, 'Pedido de reserva SITE.');
            $mensagem->subject('Pedido de reserva.');

        });

        return redirect()->back()->with('alert', 'Pedido de reserva efetuado !');
    }
}
