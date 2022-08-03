

@extends('layouts.niceadmin')

@section('content')


<div class="pagetitle">
  <h1>Reglamentoss</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de reglamentos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12 ">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reglamentos publicados</h5>

          <div class="table-responsive">
            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Reglamento</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Fecha de publicación</th>
                  <th scope="col">Opción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reglamentos as $reglamento) 
                <tr>
                  <td>{{$reglamento->id}}</td>
                  <td><b>{{$reglamento->nombre_reglamento}}</b></td>
                  <td>{{$reglamento->descripcion}}</td>
                  <td>{{$reglamento->created_at->format('d/m/Y')}}</td>
                  <td>
                    <a href="{{asset('files/reglamentos/'.$reglamento->archivo)}}" target="_blank" class="btn btn-sm btn-success">
                      <i class="bi bi-box-arrow-up-right"> Ver reglamento</i>
                    </a>
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