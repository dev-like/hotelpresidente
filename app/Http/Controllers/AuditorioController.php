<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auditorio;
use Illuminate\Http\Request;
use Image;
use Storage;

class AuditorioController extends Controller
{
    public function index()
    {
      $auditorio = Auditorio::get();
      $auditorio = count($auditorio) ? $auditorio[0] : new Auditorio();

      return view('admin.auditorio.index', ['auditorio' => $auditorio]);
    }

    public function create()
    {
      return view('admin.auditorio.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'imagem'        => 'sometimes|image|mimes:jpeg,png,jpg',
      ));

        $auditorio = new Auditorio;
        $auditorio->titulo = $request->titulo;
        $auditorio->texto  = $request->texto;
        $auditorio->imagem  = $request->imagem;

        if($request->hasFile('imagem')){
          $image = $request->file('imagem');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/auditorio/' . $filename);
          Image::make($image)->save($location);
          $auditorio->imagem = $filename;
      }

      $auditorio->save();
      $request->session()->flash('success', 'Dados do auditorio cadastrados com sucesso.');
      return redirect('admin/auditorio')->with('flash_message', 'Quem Somos adicionado!');
    }

    public function edit($id)
    {
      $auditorio = Auditorio::findOrFail($id);
      return view('admin.auditorio.edit', compact('auditorio'));
    }

    public function update(Request $request, $id)
    {
      $auditorio = Auditorio::find($id);
      $auditorio->fill($request->all());


      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/auditorio/' . $filename);
        Image::make($image)->save($location);

      if ($auditorio->imagem) {
          $oldFilename = $auditorio->imagem;
          Storage::delete('uploads/auditorio/'.$oldFilename);
      }
        $auditorio->imagem = $filename;
      }

      $auditorio->save();

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/auditorio')->with('flash_message', 'Quem somos alterado com sucesso !');
    }
}
