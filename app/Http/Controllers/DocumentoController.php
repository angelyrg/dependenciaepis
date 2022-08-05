<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentoRequest;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }
   
    public function store(DocumentoRequest $request)
    {
        
        //return $request;

        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/documentos/", $nombre_archivo);

        $documento = new Documento();
        $documento->nombre_documento = $request->nombre_documento;
        $documento->proyecto_id = $request->proyecto_id;
        $documento->archivo = $nombre_archivo;
        $documento->save();

        return redirect()->route('proyectos.show', $request->proyecto_id)->with('success', 'Documento cargado correctamente');

    }


    public function destroy(Documento $documento){

        //return $documento->proyecto_id;

        $file_path = public_path().'/files/documentos/'.$documento->archivo;
        File::delete($file_path);
        $documento->delete();

        //return redirect()->route('informes.index')->with('success', '¡Informe eliminado con éxito!');
        return redirect()->route('proyectos.show', $documento->proyecto_id)->with('success', '¡Documento eliminado correctamente!');

    }

    
}
