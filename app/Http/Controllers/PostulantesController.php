<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Persona;
use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Illuminate\Support\Str;

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
        $postulantes = Postulante::with(['universidad', 'pasantia', 'persona'])->orderByDesc('id')->get();
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
    
                $postulante = Postulante::create([
                    'id' => $persona->id,
                    'tipo_postulante' => $request->tipo_postulante,
                    'numero_anios_semestre' => $request->numero_anios_semestre,
                    'carrera' => $request->carrera,
                    'id_universidad' => $request->id_universidad,
                    'id_pasantia' => $request->id_pasantia,
    
                ]);
                // $tipoDoc =  DB::table('tipo_documento')->where('nombre', 'DOCUMENTOS DEL POSTULANTE')->value('id');
                $oMerger = PDFMerger::init();
                if ($request->hasFile('doc_ci')) {
                    $doc_ci = $request->file('doc_ci')->getPathname();
                    $oMerger->addPDF($doc_ci, 'all');
                }
                if ($request->hasFile('doc_cv')) {
                    $doc_cv = $request->file('doc_cv')->getPathname();
                    $oMerger->addPDF($doc_cv, 'all');
                }
                // if ($request->hasFile('doc_matricula')) {
                //     $doc_matricula = $request->file('doc_matricula')->getPathname();
                //     $oMerger->addPDF($doc_matricula, 'all');
                // }
                // if ($request->hasFile('doc_histoAca')) {
                //     $doc_histoAca = $request->file('doc_histoAca')->getPathname();
                //     $oMerger->addPDF($doc_histoAca, 'all');
                // }
                // if ($request->hasFile('doc_notasol')) {
                //     $doc_notasol = $request->file('doc_notasol')->getPathname();
                //     $oMerger->addPDF($doc_notasol, 'all');
                // }
                // if ($request->hasFile('doc_certificadoEgreso')) {
                //     $doc_cerificadoEgreso = $request->file('doc_certificadoEgreso')->getPathname();
                //     $oMerger->addPDF($doc_cerificadoEgreso, 'all');
                // }
                $oMerger->merge();
                $oMerger->save(public_path('merged_result1.pdf'));
                // $ruta = Storage::putFile('filePersonal/'.$persona->ci, $oMerger, 'public' );

                // Documento::create([
                //     'nombre' => Str::uuid(),
                //     'ruta' => '$ruta',
                //     'id_persona' => $persona->id,
                //     'id_tipo_documento' => 1
                // ]);
                // if ($request->hasFile('doc_ci')) {
                //     $doc_ci = $request->file('doc_ci')->store('postulaciones/'. $persona->ci, 'public');
                //     Documento::create([
                //         'nombre' => Str::uuid(),
                //         'ruta' => $doc_ci,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'DOCUMENTOS DEL POSTULANTE')->value('id'),
                //     ]);
                // }
                // if ($request->hasFile('doc_cv')) {
                //     $doc_cv = $request->file('doc_cv')->store('postulaciones/'. $persona->ci, 'public');
                //     $documento=Documento::create([
                //         'uuid' => Str::uuid(),
                //         'ruta' => $doc_cv,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'hoja de vida')->value('id'),
                //     ]);
                // }
                // if ($request->hasFile('doc_matricula')) {
                //     $doc_matricula = $request->file('doc_matricula')->store('postulaciones/'. $persona->ci, 'public');
                //     $documento=Documento::create([
                //         'uuid' => Str::uuid(),
                //         'ruta' => $doc_matricula,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'matricula')->value('id'),
                //     ]);
                // }
                // if ($request->hasFile('doc_histoAca')) {
                //     $doc_histoAca = $request->file('doc_histoAca')->store('postulaciones/'. $persona->ci, 'public');
                //     $documento=Documento::create([
                //         'uuid' => Str::uuid(),
                //         'ruta' => $doc_histoAca,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'record academico')->value('id'),
                //     ]);
                // }
                // if ($request->hasFile('doc_notasol')) {
                //     $doc_notasol = $request->file('doc_notasol')->store('postulaciones/'. $persona->ci, 'public');
                //     $documento=Documento::create([
                //         'uuid' => Str::uuid(),
                //         'ruta' => $doc_notasol,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'carta carrera')->value('id'),
                //     ]);
                // }
                // if ($request->hasFile('doc_certificadoEgreso')) {
                //     $doc_cerificadoEgreso = $request->file('doc_certificadoEgreso')->store('postulaciones/'. $persona->ci, 'public');
                //     $documento=Documento::create([
                //         'uuid' => Str::uuid(),
                //         'ruta' => $doc_cerificadoEgreso,
                //         'id_persona' => $persona->id,
                //         'id_tipo_documento' => DB::table('tipo_documento')->where('tipodoc', 'certificado egreso')->value('id'),
                //     ]);
                // }
                
            });
                // $tipoDoc =  DB::table('tipo_documento')->where('nombre', 'DOCUMENTOS DEL POSTULANTE')->value('id');
                // if ($request->hasFile('doc_ci')) {
                //     $doc_ci = $request->file('doc_ci')->getPathname();
                //     $oMerger = PDFMerger::init();
                //     $oMerger->addPDF($doc_ci, 'all');
                //     $oMerger->merge();
                // $oMerger->save(public_path('merged_result.pdf'));
                // }
                // if ($request->hasFile('doc_cv')) {
                //     $doc_cv = $request->file('doc_cv')->getPathname();
                //     $oMerger->addPDF($doc_cv, 'all');
                // }
                // if ($request->hasFile('doc_matricula')) {
                //     $doc_matricula = $request->file('doc_matricula')->getPathname();
                //     $oMerger->addPDF($doc_matricula, 'all');
                // }
                // if ($request->hasFile('doc_histoAca')) {
                //     $doc_histoAca = $request->file('doc_histoAca')->getPathname();
                //     $oMerger->addPDF($doc_histoAca, 'all');
                // }
                // if ($request->hasFile('doc_notasol')) {
                //     $doc_notasol = $request->file('doc_notasol')->getPathname();
                //     $oMerger->addPDF($doc_notasol, 'all');
                // }
                // if ($request->hasFile('doc_certificadoEgreso')) {
                //     $doc_cerificadoEgreso = $request->file('doc_certificadoEgreso')->getPathname();
                //     $oMerger->addPDF($doc_cerificadoEgreso, 'all');
                // }
                // $oMerger->merge();
                // $oMerger->save(public_path('merged_result.pdf'));
                // $ruta = Storage::putFile('filePersonal/'.$persona->ci, $oMerger, 'public' );

                // Documento::create([
                //     'nombre' => Str::uuid(),
                //     'ruta' => public_path(),
                //     'id_persona' => $persona->id,
                //     'id_tipo_documento' => $tipoDoc
                // ]);
        // });

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
