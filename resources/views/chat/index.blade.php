@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <div class="row d-flex justify-content-between">
    <div class="col">
      <h1>Documentos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item">Informe</li>
          <li class="breadcrumb-item active">Detalles del informe</li>
        </ol>
      </nav>
    </div>
  </div>

</div><!-- End Page Title -->

<section class="section dashboard">

  <div class="row">
    
    <div class="col-lg-7">

      <div class="card">

        <div class="card-body pb-0">
          <h5 class="card-title">Mensajes enviados <span>| Recibidos</span></h5>

          <div class="news">

            @foreach ($chats as $chat)
              <div class="row border py-1 rounded-3 mb-3">
                <div class="col-2 card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-chat-left-text"></i>
                </div>
                <div class="col-10 ">
                  <small>
                    <b>{{$chat->name}} <span class="badge bg-success ">{{$chat->rol}}</span> </b> <span class="text-muted">| {{$chat->created_at->diffForHumans()}}</span> <br>
                  </small>
                  <small class="py-5">{{$chat->mensaje}}</small><br>
                  @if ($chat->archivo != null)
                    <div class="text-end ">
                      <a href="{{asset('files/informes/'.$chat->archivo)}}" class="btn btn-sm btn-outline-success "><i class="bi bi-folder-symlink "></i> Archivo adjunto</a>
                    </div>
                  @endif
                </div>
              </div>
            @endforeach

          </div><!-- End sidebar recent posts-->

        </div>

        <div class="card-footer bg-light ">

          <div class="row">
            <div class="col-12">
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
          </div>        
          
          <form action="{{route('chats.store')}}" method="post"  class="row g-3 needs-validation mt-2 " novalidate>
            @csrf

            <div class="row">                
              <div class="col-10">
                
                <div class="input-group has-validation">
                  <textarea name="mensaje" class="form-control" required cols="30" rows="2" placeholder="Mensaje..."></textarea>
                  <div class="invalid-feedback">
                    El contenido del comentario es obligatorio.
                  </div>
                </div>

                <div class="input-group has-validation mt-2">
                  <div class="col-4">
                    <label for="archivo">Adjuntar archivo</label><br>
                  </div>
                  <input type="file" name="archivo" id="archivo" class="form-control" >
                </div>

              </div>
              
              <div class="col-2 d-flex align-items-start">
                <button type="submit" class="btn  btn-primary">
                  <i class="bi bi-send"></i> Enviar
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
      
    </div>

  </div>
  
</section>

@endsection

