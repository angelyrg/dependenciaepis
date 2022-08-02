

@extends('layouts.niceadmin')

@section('content')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">

      <h1>Proyecto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Proyecto</li>
          <li class="breadcrumb-item active">Asesores</li>
    
        </ol>
      </nav>
    </div>

  </div>
</div><!-- End Page Title -->

<section class="section profile">

  <div class="row">

    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Asesores asignados</div>
  
          <div class="table-responsive ">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ejecutor->proyecto->asesores as $asesor)
                  <tr>
                    <td>{{$asesor->id}}</td>
                    <td>{{$asesor->nombres}}</td>
                    <td>{{$asesor->apellidos}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
  
  
        </div>
      </div>
    </div>

  </div>
  
</section>

@endsection

