

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

    @foreach ($ejecutor->proyecto->asesores as $asesor)                
      <div class="col-md-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{asset('assets/img/profesor.png')}}"  class="rounded-circle">
            <h2 class="text-center">{{ $asesor->nombres}}<br>{{$asesor->apellidos }}</h2>
            <h3>{{ $asesor->dni }}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    @endforeach

  </div>
  
</section>

@endsection

