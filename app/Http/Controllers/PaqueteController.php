<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaqueteController extends Controller
{
    public function index(){
        $paquetes = Paquete::all();

        return response()->json($paquetes, 200);
    }

    public function store(Request $request){
        try{
            $validate = Validator::make($request->all(), [
                'nombre' => 'required|max:20',
                'lugar' => 'required|max:20'
            ]);

            if($validate->fails()) {
                return response()->json(['error' => $validate->errors()], 422);
            }

            $paquete = new Paquete();
            $paquete->nombre = $request->nombre;
            $paquete->lugar = $request->lugar;
            $paquete->save();

            return response()->json(['msg' => 'Paquete creado con éxito', 'data' => $paquete]);
        }
        catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        $paquete = Paquete::find($id);
        if(!$paquete){
            return response()->json(['error' => 'Paquete no encontrado'], 404);
        }
        try{
            $validate = Validator::make($request->all(), [
                'nombre' => 'required|max:20',
                'lugar' => 'required|max:20'
            ]);

            if($validate->fails()) {
                return response()->json(['error' => $validate->errors()]);
            }

            $paquete->nombre = $request->nombre;
            $paquete->lugar = $request->lugar;
            $paquete->save();

            return response()->json(['msg' => 'Paquete editado con éxito', 'data' => $paquete]);
        }
        catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function delete($id){
        $paquete = Paquete::find($id);

        if(!$paquete){
            return response()->json(['error' => 'Paquete no encontrado'], 404);
        }

        $paquete->delete();

        return response()->json(['msg' => 'Paquete eliminado con exito', 'data' => $paquete]);    
    }

    public function show($id){
        $paquete = Paquete::find($id);

        if(!$paquete){
            return response()->json(['error' => 'Paquete no encontrado'], 404);
        }
        return response()->json($paquete);
    }
}
