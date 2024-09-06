<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use DB;

class GaleriaController extends Controller
{
    public function index()
    {
      $galeria = Galeria::get();
      $galeria = count($galeria) ? $galeria[0] : new Galeria();

      return view('admin.galeria.gallery', ['galeria' => $galeria]);
    }

    public function create()
    {
      return view('admin.depoimento.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
      'horizontal'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'horizontal1'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'vertical'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'vertical1'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'quadrado'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'quadrado1'        => 'sometimes|image|mimes:jpeg,png,jpg',

      ));

        $galeria = new Galeria;
        $galeria->horizontal       = $request->horizontal;
        $galeria->horizontal1       = $request->horizontal1;
        $galeria->vertical       = $request->vertical;
        $galeria->vertical1       = $request->vertical1;
        $galeria->quadrado       = $request->quadrado;
        $galeria->quadrado1       = $request->quadrado1;

        if ($request->hasFile('horizontal')) {
            $image = $request->file('horizontal');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->horizontal = $filename;
        }
        if ($request->hasFile('horizontal1')) {
            $image = $request->file('horizontal1');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->horizontal1 = $filename;
        }
        if ($request->hasFile('vertical')) {
            $image = $request->file('vertical');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->vertical = $filename;
        }
        if ($request->hasFile('vertical1')) {
            $image = $request->file('vertical1');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->vertical1 = $filename;
        }
        if ($request->hasFile('quadrado')) {
            $image = $request->file('quadrado');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->quadrado = $filename;
        }
        if ($request->hasFile('quadrado1')) {
            $image = $request->file('quadrado1');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/galeria/' . $filename);
            Image::make($image)->save($location);
            $galeria->quadrado1 = $filename;
        }

        $galeria->save();
        $request->session()->flash('success', 'Galeria adicionado com sucesso');
        return redirect('admin/galeria')->with('flash_message', 'Galeria adicionado!');
    }

    public function edit($id , Request $request)
    {
      $galeria = Galeria::findOrFail($id);
      return view('admin.galeria.edit', compact('galeria'));
    }

    public function update(Request $request, $id)
    {
      $galeria = Galeria::find($id);

      $this->validate($request, array(
      'horizontal'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'horizontal1'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'vertical'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'vertical1'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'quadrado'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'quadrado1'        => 'sometimes|image|mimes:jpeg,png,jpg',

      ));

      $galeria->fill($request->all());

      if ($request->hasFile('horizontal')) {
        $image = $request->file('horizontal');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->horizontal) {
          $oldFilename = $galeria->horizontal;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->horizontal = $filename;
        }

      if ($request->hasFile('horizontal1')) {
        $image = $request->file('horizontal1');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->horizontal1) {
          $oldFilename = $galeria->horizontal1;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->horizontal1 = $filename;
        }

      if ($request->hasFile('vertical')) {
        $image = $request->file('vertical');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->vertical) {
          $oldFilename = $galeria->vertical;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->vertical = $filename;
        }

      if ($request->hasFile('vertical1')) {
        $image = $request->file('vertical1');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->vertical1) {
          $oldFilename = $galeria->vertical1;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->vertical1 = $filename;
        }

      if ($request->hasFile('quadrado')) {
        $image = $request->file('quadrado');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->quadrado) {
          $oldFilename = $galeria->quadrado;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->quadrado = $filename;
        }

      if ($request->hasFile('quadrado1')) {
        $image = $request->file('quadrado1');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        Image::make($image)->save($location);

        if ($galeria->quadrado1) {
          $oldFilename = $galeria->quadrado1;
          Storage::delete('uploads/galeria/'.$oldFilename);
        }
          $galeria->quadrado1 = $filename;
        }

        $galeria->save();

        $request->session()->flash('success', 'Galeria foi modificado com sucesso');
        return redirect('admin/galeria');
    }
}
