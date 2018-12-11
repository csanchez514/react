<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use GuzzleHttp\Client;

class ControladorCedula extends Controller
{
    public function store(Request $request){
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $newPost = $database    ->getReference('/')
                                ->push([
                                    'Cedula' => $request->cedula,

                                    ]);
        return view("cedula");
    }
    public function ver(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('/');
        $value = $reference->getValue();
        $snapshot = $reference->getSnapshot();
        dd($snapshot);
        return view("cedula");
    }   
    public function save($id,$id2){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-7481b96284.json');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();
        $database = $firebase->getDatabase();
        $reference = $database->getReference('/')
        ->set([
            'cedula' => $id
           ]);
     
        $database->getReference('/cedula')->set($id2);
        print_r('Id cambiado ');
    }
}