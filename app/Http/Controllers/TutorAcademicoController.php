<?php

namespace App\Http\Controllers;

use App\Models\TutorAcademico;
use Illuminate\Http\Request;

class TutorAcademicoController extends Controller
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

        $tutoresAcademicos = TutorAcademico::query()
            ->with(['persona', 'universidad'])
            ->whereHas('persona', function ($query) use ($search) {
                $query->where('nombres', 'ilike', "%$search%")
                    ->orWhere('apellidos', 'ilike', "%$search%")
                    ->orWhere('ci', 'ilike', "%$search%")
                    ->orWhere('expedicion', 'ilike', "%$search%");
            })
            ->orWhere('nivel_academico', 'ilike', "%$search%")
            ->orderByDesc('id')
            ->paginate(5);
        return $tutoresAcademicos;
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
