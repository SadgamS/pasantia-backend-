<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();

        return $personas;
    }

    public function selected(Request $request)
    {
        $search = $request->input('search');
        $words = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $personas = DB::table('persona')->select('id', 'nombres', 'apellidos', 'ci', 'expedicion')
            ->when($search, function ($query) use ($words) {
                foreach ($words as $value) {
                    $query->where('nombres', 'ilike', "$value%")
                        ->orWhere('apellidos', 'ilike', "$value%");
                }
            })
            ->limit(10)
            ->orderByDesc('id')
            ->get();
        return $personas;
    }

    public function postulantes()
    {
        $postulantes = DB::table('persona')
            ->join('postulante', 'persona.id', '=', 'postulante.id')
            ->limit(10)
            ->orderByDesc('id')
            ->get();
        return $postulantes;
    }
    public function servidor_publico()
    {
        $servidor_publico = DB::table('persona')
            ->join('servidor_publico', 'persona.id', '=', 'servidor_publico.id')
            ->limit(10)
            ->orderByDesc('id')
            ->get();
        return $servidor_publico;
    }
    public function tutor_academico()
    {
        $tutor_academico = DB::table('persona')
            ->join('tutor_academico', 'persona.id', '=', 'tutor_academico.id')
            ->limit(10)
            ->orderByDesc('id')
            ->get();
        return $tutor_academico;
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
}
