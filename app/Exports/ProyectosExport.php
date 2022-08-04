<?php

namespace App\Exports;

use App\Models\Proyecto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProyectosExport implements FromView {

    public function view(): View {
        return view('responsable.informesdinamicos.export', ['proyectos'=>Proyecto::all()]);
    }

}
