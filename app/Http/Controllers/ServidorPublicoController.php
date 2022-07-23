<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\ServidorPublico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServidorPublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');

        $servidorPublico = ServidorPublico::query()
            ->with(['persona', 'unidad'])
            ->whereHas('persona', function ($query) use ($search) {
                $query->where('nombres', 'ilike', "%$search%")
                    ->orWhere('apellidos', 'ilike', "%$search%")
                    ->orWhere('ci', 'ilike', "%$search%")
                    ->orWhere('expedicion', 'ilike', "%$search%");
            })->orWhere('formacion_academica', 'ilike', "%$search%")
            ->orWhere('nivel_academico', 'ilike', "%$search%")
            ->orderByDesc('id')
            ->paginate(5);
        return $servidorPublico;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            DB::transaction(function () use($request){
                $persona = Persona::create([
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'ci' => $request->ci,
                    'expedicion' => $request->expedicion,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'domicilio' => $request->domicilio,
                    'ciudad' => $request->ciudad,
                    'correo' => $request->correo,
                    'celular' => $request->celular,
                    'numero_referencia' => $request->numero_referencia,
                    'nombre_referencia' => $request->nombre_referencia,
                ]);
                ServidorPublico::create([
                    'id' => $persona->id,
                    'formacion_academica' => $request->formacion_academica,
                    'nivel_academico' => $request->nivel_academico,
                    'id_unidad' => $request->id_unidad
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
