@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Perfil</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Mi perfil</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          @if ($user->rol == "Responsable")              
            <img src="{{ asset('assets/img/manager.png') }}" alt="Perfil" class="rounded-circle">
          @elseif ($user->rol == "Asesor")              
            <img src="{{ asset('assets/img/profesor2.png') }}" alt="Perfil" class="rounded-circle">
          @elseif ($user->rol == "Ejecutor")              
            <img src="{{ asset('assets/img/student.png') }}" alt="Perfil" class="rounded-circle">
          @endif

          <h2 class="text-center">{{$user->name}}</h2>
          <h6 class="text-center">{{$user->username}}</h6>
          <h3>{{$user->rol}}</h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
            </li>

          </ul>
          <div class="tab-content my-2">

            <div class="tab-pane show active  pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="{{route('password')}}" method="POST" class="row g-3 pt-4 needs-validation" novalidate >
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="currentpassword" value="{{old('currentpassword')}}" type="password" class="form-control" id="currentPassword" required>
                    <div class="invalid-feedback">Ingrese su contraseña actual</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" value="{{old('newpassword')}}" type="password" class="form-control" id="newPassword" required>
                    <div class="invalid-feedback">Ingrese la nueva contraseña</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar nueva contraseña</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" value="{{old('renewpassword')}}" type="password" class="form-control" id="renewPassword" required>
                    <div class="invalid-feedback">Repita la nueva contraseña</div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    @if ($errors->any())
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                          @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                  </div>
                </div> <!--End Mensajes de error-->

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection