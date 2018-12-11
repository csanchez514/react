<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use GuzzleHttp\Client;
class formulario extends Controller
{
    public function store(Request $request){
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $newPost = $database    ->getReference('/')
                                ->push([
                                    'Email' => $request->email,
                                   'Categoria'=> $request->categoria,
                                    'Telefono'=> $request ->telefono,
                                    'Descripcion' => $request->descripcion
                                    ]);
        return view("formulario");
    }
    public function buscar(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/proyectont-5155f-firebase-adminsdk-z76pt-15b69e47c4.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://proyectont-5155f.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('/');
        $value = $reference->getValue();
        dd($value);
        return view("formulario");
    }   
    public function ver(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('/');
        $value = $reference->getValue();
        dd($value);
    }
}
