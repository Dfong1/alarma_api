<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    public function index($id){
        $historial = Historial::all()->where('paquete_id', $id);

        return response()->json($historial);
    }

    public function store(Request $request){
        try{
            $validate = Validator::make($request->all(), [
                'datos' => 'required',
                'paquete_id' => 'required',
            ]);

            if($validate->fails()) {
                return response()->json(['error' => $validate->errors()], 422);
            }

            $historial = new Historial();
            $historial->datos = $request->datos;
            $historial->fecha_hora = Carbon::now('America/Monterrey')->toDateTimeString();
            $historial->paquete_id = $request->paquete_id;
            $historial->save();

            return response()->json(['msg' => 'Paquete creado con éxito', 'data' => $historial]);
        }
        catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
