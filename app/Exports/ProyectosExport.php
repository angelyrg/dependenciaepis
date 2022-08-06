<?php

namespace App\Exports;

use App\Models\Proyecto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class ProyectosExport implements FromView {


	public function __construct($fecha_desde, $fecha_hasta)
	{
        if ($fecha_desde != null && $fecha_hasta != null){
            $this->fecha_inicio = $fecha_desde."-1";
            $this->fecha_fin = $fecha_hasta."-1";

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
