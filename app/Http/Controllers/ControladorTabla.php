<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\usuarios;
use PHPUnit\Util\Json;

class ControladorTabla extends Controller
{
     public function index()
     {
         $result = usuarios::all();
         return json_encode($result);

     }
     public function create()
     {
         
     }
     public function store(Request $request)
     {
         
     }
     public function show($id)
     {
        $resul = usuarios::where('name', 'LIKE', '%' . strtolower($id) . '%')->get();
        return json_encode($resul);
     }

     public function edit($id)
     {
        $usuario = usuarios::findOrFail($id);
        return view($this->path.'.edit',compact('usuarios'));
     }
     public function update(Request $request, $id)
     {
         $user = usuarios::findOrFail($id);
         $user-> name = $request->name;
         $user-> email = $request->email;
         $user-> phone = $request->phone;
         $user->save();
         
     }
     public function destroy($id)
     {
         try {
             $usuario = usuarios::findOrFail($id);
             $usuario ->delete();
             return "Se eliminó el usuario";
         } catch (Exception $e) {

             return "Error";
         }
     }
}
