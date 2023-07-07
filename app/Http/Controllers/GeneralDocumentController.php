<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralDocumentStoreRequest;
use App\Models\GeneralDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GeneralDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = GeneralDocument::all();
        return view('responsable.generaldocuments.index', compact('documents'));
    }


    public function create(){
        return view('responsable.generaldocuments.create');
    }

    

    public function store(GeneralDocumentStoreRequest $request){        
        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/documentos/", $nombre_archivo);

        $generaldocument = new GeneralDocument();
        $generaldocument->nombre_documento = $request->nombre_documento;
        $generaldocument->descripcion = $request->descripcion;
        $generaldocument->archivo = $nombre_archivo;
        $generaldocument->save();

        return redirect()->route('generaldocuments.index')->with('success', 'Documento '.$request->nombre_documento.' creado correctamente');
    }



    public function destroy(GeneralDocument $generaldocument){
        $file_path = public_path().'/files/documentos/'.$generaldocument->archivo;
        File::delete($file_path);
        $generaldocument->delete();

        return redirect()->route('generaldocuments.index')->with('success', 'Documento eliminado correctamente.');
    }
    
}
