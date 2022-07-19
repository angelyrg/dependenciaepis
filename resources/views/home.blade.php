

@extends('layouts.niceadmin')

@section('content')



<div class="pagetitle">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
    </ol>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->name }}</h5>
            <p>This user has role <b>{{ Auth::user()->rol }}</b></p>
          </div>
        </div>
      </div>


    </div>
</section>






@endsection