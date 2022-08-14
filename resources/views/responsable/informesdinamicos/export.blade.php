<table>
    <thead>
    <tr class="text-primary">
        <th>PROYECTO</th>
        <th>MODALIDAD</th>
        <th>INICIO</th>
        <th>FINALIZACIÓN</th>
        <th>GRUPO</th>
        <th>MODALIDAD GRUPO</th>
        <th>ESTADO</th>
        <th>INTEGRANTES</th>
    </tr>
    </thead>
    <tbody>
    <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?> <!-- Necesario para tener los meses del año en español -->

    @foreach($proyectos as $proyecto)
        <tr >
            <td>{{$proyecto->nombre_proyecto}}</td>
            <td>{{$proyecto->modalidad->nombre}}</td>
            <td>{{$meses[date('m', strtotime($proyecto->fecha_inicio))-1]." ".date('Y', strtotime($proyecto->fecha_inicio))}}</td>
            <td>{{$meses[date('m', strtotime($proyecto->fecha_fin))-1]." ".date('Y', strtotime($proyecto->fecha_fin))}}</td>
            <td>{{$proyecto->nombre_grupo}}</td>
            <td>{{$proyecto->modalidad_grupo}}</td>
            <td>{{$proyecto->estado}}</td>
            <td>{{$proyecto->miembros->first()->apellidos." ".$proyecto->miembros->first()->nombres}}</td>
            
        </tr> 
        @foreach ($proyecto->miembros as $key=>$ejecutor)
            @if($key == 0)
                @continue
            @endif
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>{{$ejecutor->apellidos." ".$ejecutor->nombres}}</td>
            </tr>
            
        @endforeach
    @endforeach
    </tbody>
</table>