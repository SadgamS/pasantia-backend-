<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Persona;
use App\Models\Postulante;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LynX39\LaraPdfMerger\Facades\PdfMerger;


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
        $postulantes = Postulante::with(['universidad', 'pasantia', 'persona'])->orderByDesc('id')->paginate(5);
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
    
                Postulante::create([
                    'id' => $persona->id,
                    'tipo_postulante' => $request->tipo_postulante,
                    'numero_anios_semestre' => $request->numero_anios_semestre,
                    'carrera' => $request->carrera,
                    'id_universidad' => $request->id_universidad,
                    'id_pasantia' => $request->id_pasantia,
    
                ]);
                $tipoDoc =  DB::table('tipo_documento')->where('nombre', 'DOCUMENTOS DEL POSTULANTE')->value('id');
                $pdfMerger = PDFMerger::init();
                if ($request->hasFile('doc_ci')) {
                    $doc_ci = $request->file('doc_ci')->getPathname();
                    $pdfMerger->addPDF($doc_ci, 'all');
                }
                if ($request->hasFile('doc_cv')) {
                    $doc_cv = $request->file('doc_cv')->getPathname();
                    $pdfMerger->addPDF($doc_cv, 'all');
                }
                if ($request->hasFile('doc_matricula')) {
                    $doc_matricula = $request->file('doc_matricula')->getPathname();
                    $pdfMerger->addPDF($doc_matricula, 'all');
                }
                if ($request->hasFile('doc_histoAca')) {
                    $doc_histoAca = $request->file('doc_histoAca')->getPathname();
                    $pdfMerger->addPDF($doc_histoAca, 'all');
                }
                if ($request->hasFile('doc_notasol')) {
                    $doc_notasol = $request->file('doc_notasol')->getPathname();
                    $pdfMerger->addPDF($doc_notasol, 'all');
                }
                if ($request->hasFile('doc_certificadoEgreso')) {
                    $doc_cerificadoEgreso = $request->file('doc_certificadoEgreso')->getPathname();
                    $pdfMerger->addPDF($doc_cerificadoEgreso, 'all');
                }
                $pdfMerger->merge();
                $content = $pdfMerger->save($persona->id.'pdf', 'string');
                $nombre = Str::uuid();
                Storage::disk('public')->put('filePersonal/'.$persona->ci.'/'.$nombre.'.pdf', $content);
                $ruta = Storage::url('filePersonal/'.$persona->ci.'/'.$nombre.'.pdf');
                Documento::create([
                    'nombre' => $nombre,
                    'ruta' => $ruta,
                    'id_persona' => $persona->id,
                    'id_tipo_documento' => $tipoDoc
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
