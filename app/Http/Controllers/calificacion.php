<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use GuzzleHttp\Client;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class calificacion extends Controller
{
    function notas($id){
        if($id == 1){
            $arrestudiantes[0]['estudiante']= 'Kevin Jarrin';
            $arrestudiantes[0]['nota']= 8;
            $arrestudiantes[1]['estudiante']= 'Leonardo Chamorro';
            $arrestudiantes[1]['nota']= 7;
            $arrestudiantes[2]['estudiante']= 'Sebastian Villacis';
            $arrestudiantes[2]['nota']= 9;
            $arrestudiantes[3]['estudiante']= 'Christian Sánchez';
            $arrestudiantes[3]['nota']= 9;
        }
        elseif($id == 2){
            $arrestudiantes[0]['estudiante']= 'Francisco Mejia';
            $arrestudiantes[0]['nota']= 8;
            $arrestudiantes[1]['estudiante']= 'Leonardo Chamorro';

            $arrestudiantes[1]['nota']= 7;
            $arrestudiantes[2]['estudiante']= 'Sebastian Villacis';
            $arrestudiantes[2]['nota']= 9;
            $arrestudiantes[3]['estudiante']= 'Christian Sánchez';
            $arrestudiantes[3]['nota']= 9;
        }
        elseif($id == 3){
            $arrestudiantes[0]['estudiante']= 'Ana Acosta';
            $arrestudiantes[0]['nota']= 7;
            $arrestudiantes[1]['estudiante']= 'Leonardo Chamorro';
            $arrestudiantes[1]['nota']= 2;
            $arrestudiantes[2]['estudiante']= 'Sebastian Villacis';
            $arrestudiantes[2]['nota']= 2;
            $arrestudiantes[3]['estudiante']= 'Christian Sánchez';
            $arrestudiantes[3]['nota']= 9;
        }
        return view('estudiante',['estudiantes'=> $arrestudiantes]);
    }
    function calificar(){
        $estudiantes = Student::all();
        foreach($estudiantes as $row){
            
            $arrestudiantes[]['estudiante']= $row-> name;
            $arrestudiantes[]['nota1']= $row-> n1;
            $arrestudiantes[]['nota2']=  $row-> n2;
            $arrestudiantes[]['nota3']= $row-> n3;
            
        }

    }
    function IngresarEstudiante(Request $request){
        $nuevoEstudiante = new student;
        $nuevoEstudiante->name=$request->input('nombre');
        $nuevoEstudiante->level=$request->input('nivel');
        $nuevoEstudiante->n1=$request->input('nota1');
        $nuevoEstudiante->n2=$request->input('nota2');
        $nuevoEstudiante->n2=$request->input('nota3');
        $nuevoEstudiante->save();
        return view('ingresar');
    }
    function calificarporgrupo($id){
        
        $estudiantes = Student::where('level',$id)
                                    ->orderBy('name','desc')
                                    ->get();
        return view('estudiante',['estudiantes'=> $estudiantes]);
    }
    public function index(){
        return Student::all();
    }
    public function show($id){
        return Student::find($id); 
    }
    public function store(Request $request){
        return Student::create($request->all()); 
    }
    public function update(request $request){
        $row = Student::findorFail($id);
        $row->update($request->all()); 

        //return \App\student::update($request->all()); 
        return $row;
    }
    public function delete ($id) {
        $row = Student::findorFail($id);
        $a =$row->delete();
        return $a ;
    }

    function firebase(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/asdsa-fd244-firebase-adminsdk-uhfop-4ae801f8dc');
        $firebase = (new Factory)   ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://asdsa-fd244.firebaseio.com/')
                                    ->create();

        $database = $firebase->getDatabase();

        $newPost = $database    ->getReference('/')
                                ->push([

                                    'Cedula' => '1707720266',

                                    'Nombre' => 'Chris'

                                    ]);
        print_r($newPost->getvalue());
    }
    function obtenerlistadoexterno(){
        $cliente = new Client();
        $resultado= $cliente-> get ('http://172.16.0.96:8000/api/listado');


        return view('estudiante',['estudiantes'=> $json_decode($resultado->getBody())]);
    }
    function obtenerlistado(){
        $resultadoExterno = obtenerlistadoexterno();
    }
    function obtenerlistadofirebase(){
        $cliente = new Client();
        $resultado= $cliente-> get ('http://172.16.0.96:8000/api/Firebase');


        echo ($resultado->getBody());
    }
}
