

@extends('layouts.niceadmin')

@section('content')

@include('layouts.flashtoast')

<div class="pagetitle">
  <h1>Gestión de proyectos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Lista de proyectos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-end">
            <h5 class="card-title">Proyectos</h5>    

            <form  class="d-flex flex-row align-items-center flex-wrap">
              
              <?php $years = range(2017, strftime("%Y", time())); ?>

              <div class="row mb-3 px-2">
                <label for="inputEmail3" class="col-sm-6 col-form-label  px-0 d-flex justify-content-end">Año inicio desde:</label>
                <div class="col-sm-6">
                  <select class="form-select" name="fecha_desde" required>
                    <option selected disabled value="">Año inicio..</option>
                    @foreach ( array_reverse($years) as $year)
                      <option @if($fecha_desde==$year){{"selected"}}@endif>{{$year}}</option>
                    @endforeach                  
                  </select>
                </div>
              </div>

              <div class="row mb-3 ">
                <label for="inputEmail3" class="col-sm-6 col-form-label  px-0 d-flex justify-content-end">Año inicio hasta:</label>
                
                <div class="col-sm-6">
                  <select class="form-select" name="fecha_hasta" required>
                    <option selected disabled value="">Año fin...</option>
                    @foreach ( array_reverse($years) as $year)
                      <option @if($fecha_hasta==$year){{"selected"}}@endif>{{$year}}</option>
                    @endforeach                  
                  </select>
                </div>
              </div>

              <div class="row mb-3 mx-2">
                <div class="col-sm-12 mx-12">
                  <button type="submit" class="btn btn-primary "> <i class="bi bi-funnel"></i> Filtrar</button>
                </div>
              </div>

            </form>

          </div >
          <div class="d-flex justify-content-end align-items-end mb-0">
            <form action="{{route('informesdinamicos.export')}}">
                
              <input type="hidden"  name="fecha_desde" value="{{$fecha_desde}}" >
              <input type="hidden"  name="fecha_hasta" value="{{$fecha_hasta}}" >

              <button type="submit" class="btn btn-success btn-sm">
                <i class="bi bi-file-earmark-spreadsheet"></i> Descargar
              </button>

            </form>
          </div>

        </div>


          <div class="table-responsive p-2">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Proyecto</th>
                  <th scope="col">Modalidad</th>
                  <th scope="col">Inicio</th>
                  <th scope="col">Finalización</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Modalidad grupo</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Integrantes</th>
                </tr>
              </thead>
              <tbody>

                <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>  <!-- Necesario para tener los meses del año en español -->
  
                @foreach ($proyectos as $proyecto)
                  <tr >
                    <td>{{$proyecto->nombre_proyecto}}</td>
                    <td>{{$proyecto->modalidad->nombre}}</td>
                    <td>{{$meses[date('m', strtotime($proyecto->fecha_inicio))-1]." ".date('Y', strtotime($proyecto->fecha_inicio))}}</td>
                    <td>{{$meses[date('m', strtotime($proyecto->fecha_fin))-1]." ".date('Y', strtotime($proyecto->fecha_fin))}}</td>
                    <td>{{$proyecto->nombre_grupo}}</td>
                    <td>{{$proyecto->modalidad_grupo}}</td>
                    <td>{{$proyecto->estado}}</td>
                    <td>{{count($proyecto->miembros)}}</td>
                  </tr> 
                @endforeach

              </tbody>
            </table>
          </div>
          
      </div> <!-- End Card -->


    </div>
  </div>
</section>






@endsection