<?php

namespace App\Http\Controllers;

use App\Exports\ProyectosExport;
use App\Http\Requests\ProyectoRequest;
use App\Models\Asesor;
use App\Models\Cargo;
use App\Models\Ejecutor;
use App\Models\Modalidad;
use App\Models\Proyecto;
use App\Traits\ProyectoTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProyectoController extends Controller
{
    use UserTrait;
    use ProyectoTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index(){
        $proyectos = Proyecto::all();
        $modalidades = Modalidad::select('id', 'nombre')->where('estado', 'Activo')->withCount('proyectos')->get();
        return view("responsable.proyectos.index", compact('proyectos', 'modalidades'));
    }


    public function create(){
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('ctd_asesorados', '<', 2)->get();
        return view("responsable.proyectos.create", compact('modalidades', 'asesores_disponibles'));
    }


    public function store(ProyectoRequest $request){
        //return date("Y-m-t", strtotime($request->fecha_fin));
        $proyecto = new Proyecto();
        $proyecto->nombre_grupo = $request->nombre_grupo;
        $proyecto->modalidad_grupo = $request->modalidad_grupo;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->fecha_inicio = $request->fecha_inicio."-1";
        $proyecto->fecha_fin = date("Y-m-t", strtotime($request->fecha_fin));
        $proyecto->modalidad_id = $request->modalidad_id;
        $proyecto->save();


        if ($request->coasesor_id == null){
            $proyecto->asesores()->attach([$request->asesor_id]);   
            $this->addAsesor([$request->asesor_id]);
        }else{
            $proyecto->asesores()->attach([$request->asesor_id, $request->coasesor_id]);   
            $this->addAsesor([$request->asesor_id, $request->coasesor_id]);
        }

        return redirect()->route('proyectos.show', $proyecto->id);

    }

    public function show(Proyecto $proyecto){
        $ejecutores = Ejecutor::where('proyecto_id', $proyecto->id)->orderBy('cargo_id')->get();
        $cargos = Cargo::all();
        
        return view('responsable.proyectos.show', compact('proyecto', 'ejecutores', 'cargos'));
    }


    public function edit(Proyecto $proyecto){
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('ctd_asesorados', '<', 2)->get();

        return view("responsable.proyectos.edit", compact('proyecto', 'modalidades', 'asesores_disponibles'));
    }

    public function update(ProyectoRequest $request, Proyecto $proyecto){
        $proyecto->nombre_grupo = $request->nombre_grupo;
        $proyecto->modalidad_grupo = $request->modalidad_grupo;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->fecha_inicio = $request->fecha_inicio."-1";
        $proyecto->fecha_fin = date("Y-m-t", strtotime($request->fecha_fin));
        $proyecto->modalidad_id = $request->modalidad_id;
        $proyecto->save();

        foreach ($proyecto->asesores as $asesor) {
            $this->deleteAsesor($asesor->id);
        }
        $this->addAsesor([$request->asesor_id, $request->coasesor_id]);
        if ($request->coasesor_id == null){
            $proyecto->asesores()->sync([$request->asesor_id]);
        }else{
            $proyecto->asesores()->sync([$request->asesor_id, $request->coasesor_id]);
        }

        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' actualizado correctamente.');

    }


    public function destroy(Proyecto $proyecto){

        foreach ($proyecto->miembros as $miembro) {
            $this->deleteUser($miembro->user_id);
        }

        foreach ($proyecto->asesores as $asesor) {
            $this->deleteAsesor($asesor->id);
        }
        foreach ($proyecto->informes as $informe) {
            $this->deleteInforme($informe->id);
        }

        

        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 
    }

    public function export(Request $request){
 
        $fecha_desde = $request->get('fecha_desde');
        $fecha_hasta = $request->get('fecha_hasta');

        //return $fecha_desde;

        return Excel::download(new ProyectosExport($fecha_desde, $fecha_hasta), 'proyectos.xlsx'); 

    }
}
