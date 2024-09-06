<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Quartos;
use Illuminate\Http\Request;
use Image;
use Storage;
use DB;

class QuartoController extends Controller
{
    public function index()
    {
        $quartos = Quartos::all();
        return view('admin.quarto.index', ['quartos' => $quartos]);
    }
    public function create()
    {
        return view('admin.quarto.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'imagem'        => 'image|mimes:jpeg,png,jpg',
      ));
        $quartos = new Quartos;
        $quartos->nome  = $request->nome;
        $quartos->descricao  = $request->descricao;
        $quartos->valor  = $request->valor;
        $quartos->lotacao  = $request->lotacao;
        $quartos->imagem  = $request->imagem;
        $quartos->promocao  = $request->promocao;

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/quartos/' . $filename);
            Image::make($image)->save($location);
            $quartos->imagem = $filename;
        }

        $quartos->save();
        $request->session()->flash('success', 'Quarto adicionado com sucesso');
        return redirect('admin/quartos')->with('flash_message', 'Quartos adicionado!');
    }


    public function edit($id)
    {
        $quartos = Quartos::findOrFail($id);
        return view('admin.quarto.edit', ['quartos' => $quartos]);
    }
    public function update(Request $request, $id)
    {
        $quartos = Quartos::find($id);

        $quartos->fill($request->all());

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/quartos/' . $filename);
            Image::make($image)->save($location);

            if ($quartos->capa) {
                $oldFilename = $quartos->capa;
                Storage::delete('uploads/quartos/'.$oldFilename);
            }
            $quartos->imagem = $filename;
        }

        $quartos->save();
        $request->session()->flash('success', 'Quarto foi modificado com sucesso');
        return redirect('admin/quartos');
    }

    public function destroy($id)
    {
        $quartos = Quartos::find($id);
        $quartos->delete();
        return [response()->json("success"), redirect('admin/quarto')];
    }
}
