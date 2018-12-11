<?php

namespace App\Http\Controllers;
use App\Perros;
use Illuminate\Http\Request;

class ControladorPerro extends Controller
{
    public function index()
    {
        return view('buscador');
    }
    public function buscar(Request $request)
    {
        
        //CASE INSENSITIVE
        $resul = Perros::where('Nombre', 'LIKE', '%' . strtolower($request->Input('nombre')) . '%')->get();
       return $resul;
     
    }
}
