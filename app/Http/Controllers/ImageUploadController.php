<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Foto;
use Illuminate\Http\Request;
use Image as ImageFiles;
use Storage;
use DB;
use Carbon\Carbon;

class ImageUploadController extends Controller
{
  public function fileCreate()
    {
      $galeria = Galeria::all();

      return view('admin.galeria.gallery',compact('galeria'));
    }
    public function fileStore(Request $request)
    {
        $image_file = $request->file('file');
        $filename = time() . '.' . $image_file->getClientOriginalName();
        $location = public_path('uploads/galeria/' . $filename);
        ImageFiles::make($image_file)->save($location);


        $galeria = new Galeria();
        $galeria->imagem = $filename;
        $galeria->save();
    }

    public function fileDestroy( $id)
    {
      $galeria = Galeria::find($id);

      Storage::delete('uploads/galeria/'.$galeria->file_name);

      $galeria->delete();

      // return response()->json("Sucesso");
    }

}
