<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quartos;
use App\Models\Empresa;
use App\Models\Auditorio;
use App\Models\InfoQuarto;
use App\Models\Galeria;
use DB;

class WebSiteController extends Controller
{
    public function home()
    {
        $quartos = Quartos::all();
        $empresa = Empresa::find(1);
        $auditorio = Auditorio::find(1);
        $quartospromo = DB::table('quartos')->where([['promocao','1'],['deleted_at','=' ,NULL]])->get();
        // $infoquartopromo  = DB::table('infoquartos')->take(3)->get();
        $infoquarto  = InfoQuarto::all();
        $gal = Galeria::all();
        $galeria = Galeria::find(1);

        return view('pages.index',compact('empresa','auditorio','quartospromo','quartos','infoquarto','galeria'));
    }

}
