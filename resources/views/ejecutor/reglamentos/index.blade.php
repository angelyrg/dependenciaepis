

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

<section class="dashboard">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 ">

      <!-- Reglamentos -->
      <div class="card">


        <div class="card-body">
          <h5 class="card-title">Reglamentos</h5>

          <div class="activity">

            @if ( count($reglamentos) == 0)
              <P>Aún no hay reglamentos publicados.</P>
            @else
  
              @foreach ($reglamentos->reverse() as $reglamento)
                <div class="activity-item d-flex">
                  <div class="activite-label">{{$reglamento->created_at->format('d/m/Y')}}</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <b>{{$reglamento->nombre_reglamento}}</b>
                    <p>{{$reglamento->descripcion}}</p>
                    <a href="{{asset('files/reglamentos/'.$reglamento->archivo)}}" target="_blank" class="btn btn-sm btn-outline-success">
                      <i class="bi bi-box-arrow-up-right"> Ver reglamento</i>
                    </a>
                  </div>
                </div><!-- End activity item-->
                  
              @endforeach
                
            @endif


          </div>

        </div>
      </div><!-- End Reglamentos -->



    </div>

    
  </div>
  </div>
</section>






@endsection