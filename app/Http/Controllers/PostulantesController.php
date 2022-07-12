<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostulantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postulantes = Postulante::with(['universidad', 'pasantia', 'persona'])->orderByDesc('id    ')->get();
        return $postulantes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            DB::transaction(function () use ($request){
                $persona = Persona::create([
                    'nombres' => $request->nombres,
                    'primer_apellido' => $request->primer_apellido,
                    'segundo_apellido' => $request->segundo_apellido,
                    'ci' => $request->ci,
                    'extension' => $request->extension,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'domicilio' => $request->domicilio,
                    'ciudad' => $request->ciudad,
                    'correo' => $request->correo,
                    'celular' => $request->celular,
                    'numero_referencia' => $request->numero_referencia,
                    'nombre_referencia' => $request->nombre_referencia,
                ]);
    
                $postulante = Postulante::create([
                    'id' => $persona->id,
                    'tipo_postulante' => $request->tipo_postulante,
                    'numero_anios_semestre' => $request->numero_anios_semestre,
                    'carrera' => $request->carrera,
                    'id_universidad' => $request->id_universidad,
                    'id_pasantia' => $request->id_pasantia,
    
                ]);
    
            });

        } catch (\Exception $e) {
            return response()->json(['message' => 'error']);
        }

        return response()->json(['message' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
