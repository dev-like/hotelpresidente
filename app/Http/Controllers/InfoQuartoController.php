<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Quartos;
use App\Models\InfoQuarto;
use Illuminate\Http\Request;

class InfoQuartoController extends Controller
{
    public function index($quarto)
    {
      $infoquartos = InfoQuarto::paginate(1500)->where('quarto_id', $quarto);
      $quartos = Quartos::findOrFail($quarto);

      return view('admin.infoquarto.index', ['infoquartos' => $infoquartos, 'quarto'=>$quartos]);
    }

    public function create()
    {
      return view('admin.infoquarto.index',['planos'=>$quartos]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $quartos = Quartos::all();
        $infoquartos = InfoQuarto::create($requestData);

        $request->session()->flash('success', 'Informação do Quarto cadastrado com sucesso !');
        return redirect('admin/infoquarto/'.$infoquartos->quarto_id)->with('flash_message', 'informacaonutricional added!');
    }

    public function edit($id)
    {
      $infoquartos = InfoQuarto::findOrFail($id);

      return view('admin.infoquarto.edit',['infoquartos' => $infoquartos]);
    }

    public function update(Request $request, $id)
    {
      $requestData = $request->all();
      $infoquartos = InfoQuarto::findOrFail($id);
      $infoquartos->update($requestData);

      $request->session()->flash('success', 'Informação do Quarto modificado com sucesso.');
      return redirect('admin/infoquarto/'.$infoquartos->quarto_id)->with('flash_message', 'Informação do Quarto alterado com sucesso !');
    }

    public function destroy($id)
    {
      $infoquartos = InfoQuarto::find($id);
      $infoquartos->delete();
      return [response()->json("success"), redirect('admin/infoquarto')];
    }
}
