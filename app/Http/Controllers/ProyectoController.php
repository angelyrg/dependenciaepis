<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Models\Asesor;
use App\Models\Estudiante;
use App\Models\Modalidad;
use App\Models\Proyecto;
use App\Models\User;
use App\Traits\ProyectoTrait;
use App\Traits\UserTrait;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProyectoController extends Controller
{
    use UserTrait;
    use ProyectoTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        $modalidades = Modalidad::select('id', 'nombre')->where('estado', 'Activo')->withCount('proyectos')->get();
        return view("responsable.proyectos.index", compact('proyectos', 'modalidades'));
    }


    public function create()
    {
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('ctd_asesorados', '<', 2)->get();

        return view("responsable.proyectos.create", compact('modalidades', 'asesores_disponibles'));
    }


    public function store(ProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->all());

        $proyecto->asesores()->attach([$request->asesor_id, $request->coasesor_id]);        
        $this->addAsesor([$request->asesor_id, $request->coasesor_id]);

        return redirect()->route('proyectos.show', $proyecto->id);
    }

    public function show(Proyecto $proyecto)
    {
        $estudiantes = Estudiante::where('proyecto_id', $proyecto->id)->get();

        return view('responsable.proyectos.show', compact('proyecto', 'estudiantes'));
    }


    public function edit(Proyecto $proyecto)
    {
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('ctd_asesorados', '<', 2)->get();

        return view("responsable.proyectos.edit", compact('proyecto', 'modalidades', 'asesores_disponibles'));
    }

    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->codigo = $request->codigo;
        $proyecto->nombre_grupo = $request->nombre_grupo;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->modalidad_id = $request->modalidad_id;
        $proyecto->save();

        foreach ($proyecto->asesores as $asesor) {
            $this->deleteAsesor($asesor->id);
        }
        $this->addAsesor([$request->asesor_id, $request->coasesor_id]);

        $proyecto->asesores()->sync([$request->asesor_id, $request->coasesor_id]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' actualizado correctamente.');

    }


    public function destroy(Proyecto $proyecto)
    {

        foreach ($proyecto->miembros as $miembro) {
            $this->deleteUser($miembro->user_id);
        }

        foreach ($proyecto->asesores as $asesor) {
            $this->deleteAsesor($asesor->id);
        }

        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 
    }
}
