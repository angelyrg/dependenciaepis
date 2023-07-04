
@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <h1>Proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de proyectos asesorados</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12 ">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Proyectos asesorados</h5>

          <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Proyecto</th>
                  <th scope="col">Modalidad</th>
                  <th scope="col">Inicio</th>
                  <th scope="col">Finalización</th>
                  <th scope="col">Estado</th>                  
                </tr>
              </thead>
              <tbody>
                @foreach ($asesor->asesorados as $asesorado) 
                <tr>
                  <td>{{$asesorado->id}}</td>
                  <td>
                    <a href="{{route('asesorados.proyecto', $asesorado->id)}}">{{$asesorado->nombre_grupo}}</a>
                  </td>
                  <td><a href="{{route('asesorados.proyecto', $asesorado->id)}}">{{$asesorado->nombre_proyecto}}</a></td>
                  <td>{{$asesorado->modalidad->nombre}}</td>
                  <td>{{$asesorado->fecha_inicio}}</td>                  
                  <td>{{$asesorado->fecha_fin}}</td>                  
                   
                  <td>
                    <span class="badge bg-@if($asesorado->estado=="Inicio"){{'secondary'}}@elseif($asesorado->estado=="Parcial"){{'warning'}}@elseif($asesorado->estado=="Completado"){{'success'}}@endif">
                      {{$asesorado->estado}}
                    </span></td>                 
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