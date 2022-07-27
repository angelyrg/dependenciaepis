<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReglamentoStoreRequest;
use App\Http\Requests\ReglamentoUpdateRequest;
use App\Models\Reglamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReglamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reglamentos = Reglamento::all();
        return view('responsable.reglamentos.index', compact('reglamentos'));
    }


    public function create()
    {
        return view('responsable.reglamentos.create');
    }

    public function store(ReglamentoStoreRequest $request)
    {
        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/reglamentos/", $nombre_archivo);

        $reglamento = new Reglamento();
        $reglamento->nombre_reglamento = $request->nombre_reglamento;
        $reglamento->descripcion = $request->descripcion;
        $reglamento->archivo = $nombre_archivo;
        $reglamento->save();

        return redirect()->route('reglamentos.index')->with('success', 'Reglamento '.$request->nombre_reglamento.' creado correctamente');

    }



    public function edit(Reglamento $reglamento)
    {
        return view('responsable.reglamentos.edit', compact('reglamento'));
    }


    public function update(ReglamentoUpdateRequest $request, Reglamento $reglamento)
    {
        $reglamento->nombre_reglamento = $request->nombre_reglamento;
        $reglamento->descripcion = $request->descripcion;

        if ( $request->hasFile('archivo') ){
            //Elimina archivo actual
            $file_path = public_path().'/files/reglamentos/'.$reglamento->archivo;
            File::delete($file_path);
    
            //Carga el nuevo archivo
            $file = $request->file('archivo');
            $nombre_archivo = time().$file->getClientOriginalName();
            $file->move(public_path()."/files/reglamentos/", $nombre_archivo);

            $reglamento->archivo = $nombre_archivo;
        }
        $reglamento->save();
        return redirect()->route('reglamentos.index')->with('success', 'Reglamento '.$request->nombre_reglamento.' actualizado correctamente');

    }


    public function destroy(Reglamento $reglamento)
    {
        $file_path = public_path().'/files/reglamentos/'.$reglamento->archivo;
        File::delete($file_path);
        $reglamento->delete();

        return redirect()->route('reglamentos.index')->with('success', 'Reglamento eliminado correctamente.');
    }
}
