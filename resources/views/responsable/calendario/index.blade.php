
@extends('layouts.niceadmin')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/locales-all.js"></script>
    <script type="text/javascript" >
        var baseURL = {!! json_encode(url('/')) !!}
    </script>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Calendario</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Calendario</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body" >
                    <h5 class="card-title">Calendario</h5>

                    <div id="calendario"></div>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('js')
    <script src="{{asset('assets/js/fullcalendar.js')}}"></script>  
@endsection