<table>
    <thead>
    <tr class="text-primary">
        <th>Proyecto</th>
        <th>Modalidad</th>
        <th>Inicio</th>
        <th>Finalización</th>
        <th>Grupo</th>
        <th>Modalidad grupo</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?> <!-- Necesario para tener los meses del año en español -->

    @foreach($proyectos as $proyecto)
        <tr>
            <td  class="text-danger">{{ $proyecto->nombre_proyecto }}</td>
            <td>{{ $proyecto->modalidad->nombre }}</td>
            <td>{{ $meses[date('m', strtotime($proyecto->fecha_inicio))-1]." ".date('Y', strtotime($proyecto->fecha_inicio)) }}</td>
            <td>{{ $meses[date('m', strtotime($proyecto->fecha_fin))-1]." ".date('Y', strtotime($proyecto->fecha_fin)) }}</td>
            <td>{{ $proyecto->nombre_grupo }}</td>
            <td>{{ $proyecto->modalidad_grupo }}</td>
            <td>{{ $proyecto->estado }}</td>
        </tr>
    @endforeach
    </tbody>
</table>