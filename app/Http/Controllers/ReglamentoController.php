<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsable.reglamentos.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $nombre_archivo = time().$file->getClientOriginalName();
            //$file_url = public_path()."/files/reglamentos/".$nombre_archivo;

            $file->move(public_path()."/files/reglamentos/", $nombre_archivo);

            $reglamento = new Reglamento();
            $reglamento->nombre_reglamento = $request->nombre_reglamento;
            $reglamento->descripcion = $request->descripcion;
            $reglamento->archivo = $nombre_archivo;
            $reglamento->save();
        }

        return redirect()->route('reglamentos.index')->with('success', 'Reglamento '.$request->nombre_reglamento.' creado correctamente');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reglamento  $reglamento
     * @return \Illuminate\Http\Response
     */
    public function show(Reglamento $reglamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reglamento  $reglamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglamento $reglamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reglamento  $reglamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglamento $reglamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reglamento  $reglamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglamento $reglamento)
    {

        $file_path = public_path().'/files/reglamentos/'.$reglamento->archivo;

        File::delete($file_path);

        $reglamento->delete();

        return redirect()->route('reglamentos.index')->with('success', 'Reglamento eliminado correctamente.');
    }
}
