<?php

namespace App\Http\Controllers;

use App\Models\ServidorPublico;
use Illuminate\Http\Request;

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
        $words = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $servidorPublico = ServidorPublico::query()
        ->with(['persona','unidad'])
        ->whereHas('persona', function($query) use($words){
            foreach ($words as $value) {
                $query->where('nombres', 'ilike', "%$value%")
                      ->orWhere('primer_apellido', 'ilike', "%$value%")
                      ->orWhere('segundo_apellido', 'ilike', "%$value%")
                      ->orWhere('ci', 'ilike', "%$value%")
                      ->orWhere('expedicion', 'ilike', "%$value%");
            }
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
