
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Informes de los grupos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section">
  <div class="row">
    <div class="col-lg-12 ">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informes de los grupo</h5>

          <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Proyecto</th>
                  <th scope="col">Modalidad</th>
                  <th scope="col">Tipo</th>                  
                  <th scope="col">Estado</th>                  
                  <th scope="col">Opción</th>                  
                </tr>
              </thead>
              <tbody>
                @if (count($informes) == 0)
                <tr>
                  <td colspan="7">¡Aún no hay informes enviados!</td>
                </tr>
                @endif
                @foreach ($informes->reverse() as $informe) 
                <tr>
                  <td>{{$informe->proyecto->id}}</td>
                  <td>{{$informe->proyecto->nombre_grupo}}</td>
                  <td>{{$informe->proyecto->nombre_proyecto}}</td>
                  <td>{{$informe->proyecto->modalidad->nombre}}</td>
                  <td>{{$informe->tipo}}</td>
                  <td>
                    <span class="badge bg-@if($informe->estado=="Pendiente"){{'secondary'}}@elseif($informe->estado=="Devuelto"){{'danger'}}@elseif($informe->estado=="Publicado"){{'success'}}@endif">
                      <i class="bi bi-@if($informe->estado=="Pendiente"){{'circle'}}@elseif($informe->estado=="Devuelto"){{'x-circle'}}@elseif($informe->estado=="Publicado"){{'file-earmark-check'}}@endif"></i> 
                      {{$informe->estado}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('responsable.informes.show', $informe->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-check"></i> Revisar</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
  
            </table>
          </div>

        </div>
      </div>


    </div>

    
  </div>
  </div>
</section>


@endsection