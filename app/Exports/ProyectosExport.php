<?php

namespace App\Exports;

use App\Models\Proyecto;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;


class ProyectosExport implements FromView {
    
    protected $fecha_inicio;
    protected $fecha_fin;
    protected $proyectos;

	public function __construct($fecha_desde, $fecha_hasta)
	{

        if ($fecha_desde != null && $fecha_hasta != null){
            $this->fecha_inicio = $fecha_desde."-01-01";
            $this->fecha_fin = $fecha_hasta."-12-01";

            $this->proyectos = Proyecto::where('fecha_inicio', '>=', $this->fecha_inicio)
                                ->where('fecha_inicio', '<=', $this->fecha_fin)
                                ->get();
        }else{
            $this->proyectos = Proyecto::all();
        }
	}   

    public function view(): View {
        return view('responsable.informesdinamicos.export', ['proyectos'=>$this->proyectos]);

    }

}
