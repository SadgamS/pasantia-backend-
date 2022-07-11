<?php

namespace App\Http\Controllers;

use App\Models\PasantiaTrabajoDirigido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasantiaTrabajoDirigidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasantias = PasantiaTrabajoDirigido::with(['unidad', 'estudiantes'])->get();
        return $pasantias;
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
    
    public function convocatorias($tipo)
    {
        $convocatoria = DB::table('pasantia_trabajo_dirigido')->select('id','nombre_ref')
                                            ->where('tipo',$tipo)
                                            ->where('aprobado', true)
                                            ->get();
        return $convocatoria;
    }
}
