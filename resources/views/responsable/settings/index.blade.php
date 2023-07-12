@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Configuración</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Configuración general</li>
    </ol>
  </nav>
</div>

<section class="section profile">

    <div class="col-xl-10">
      <div class="card">
        <div class="card-body pt-3">
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab">Información general</button>
            </li>
          </ul>

          @if ($setting)
          <div class="row">
            <div class="col-4 pt-3">
              <b>Año</b>
              <p>{{$setting->year}}</p>
              <b>Nombre del director</b>
              <p>{{$setting->nombre_director}}</p>
              <b>Nombre del Jefe del Área:</b>
              <p>{{$responsable->name}}</p>
            </div>

            <div class="col-8 pt-3">
              <b>Reglamento aprobado con Resolución:</b>
              <p>{{$setting->reglamento_nro_resolucion}}</p>
              <b>Nombre del reglamento:</b>
              <p>{{$setting->reglamento_nombre}}</p>
              
              <b>Anexo: Informe aprobación:</b>
              <p>{{$setting->anexo_informe_aprobacion}}</p>
              <b>Anexo: Informe parcial:</b>
              <p>{{$setting->anexo_informe_parcial}}</p>
              <b>Anexo: Informe final:</b>
              <p>{{$setting->anexo_informe_final}}</p>
              <b>Casos especiales:</b>
              <p>{{$setting->anexo_informe_especial}}</p>

            </div>
            
            <p class="my-2">
              <a href="{{route('settings.edit', $setting->id)}}" class="btn btn-outline-dark">Actualizar datos</a>
            </p>
          </div>
          @else
          <div class="pt-3">
            <i>Aún no hay configuraciones</i>

            <p class="my-2">
              <a href="{{route('settings.create')}}" class="btn btn-outline-dark">Configurar</a>
            </p>

          </div>
              
          @endif


         


        </div>
      </div>
    </div>
  </div>
</section>

@endsection