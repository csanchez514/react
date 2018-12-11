<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use GuzzleHttp\Client;

class ControladorInventario extends Controller
{
    public function index(){
        return view('send');
    }
    public function store(Request $request){
       $nombre = $request->input('nombre');
       $precio = $request->input('precio');
        $cantidad = $request->input('cantidad');
        $base = $request->input('modo');
        if($base=='mysql'){
            $resul = new  Inventario();
            $resul->Nombre = $nombre;
            $resul->Precio = $precio;
            $resul->Cantidad = $cantidad;
            $resul->save();
            return redirect()->action('ControladorInventario@index', ['success' => 'Producto Guardado']);
        }
        if($base=='Firebase') {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $res = $database    ->getReference('/')
                                ->push([
                                    'Nombre' => $nombre,
                                    'Precio' => $precio,
                                    'Cantidad' => $cantidad
                                    ]);
           return redirect()->action('ControladorInventario@index', ['success' => 'Producto Guardado']);
        }
        return redirect()->action('ControladorInventario@index', ['success' => 'El producto no se guardo']);
    }

}
