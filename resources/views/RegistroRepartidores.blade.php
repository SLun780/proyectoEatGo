@extends('navbar')

@section('contenido')
<?php $ubi='Restaurante';?>
<div class="container">
<h1>REPORTE DE REPARTIDORES</h1>
<br>
<a href="{{route("altarepar")}}">
<button type="button" class="btn btn-success">Alta de repartidor</button></a>
<br>
<br>
@if (Session::has ('mensaje'))
<div class="alert alert-success">{{ Session::get('mensaje') }}</div>
@endif
<br>
<br>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="cool">Foto</th>
                <th scope="cool">No. Repartidor</th>
                <th scope="cool">Nombre completo</th>
                <th scope="cool">Estado</th>
                <th scope="cool">Municipio</th>
                <!--<th scope="cool">Sexo</th>
                <th scope="cool">Edad</th>-->
                <th scope="cool">Colonia</th>
                <!--<th scope="cool">C.P</th>-->
                <th scope="cool">Num. Seguridad Social</th>
                <th scope="cool">Fecha Ingreso</th>
                <th scope="cool">Horario </th>
                <th scope="cool">Vehiculo</th>
                <th scope="cool">Telefono Emergencias </th>
                <th scope="cool">Operaciones </th>
                
            </tr>
        </thead>

        <tbody>
            @foreach($repartidor as $r)
            <tr>
                <th ><img src ="{{asset('archivos/'. $r->img)}}" height="50" width="50"></th>
                <th >{{ $r->idrep }}</th>                
                <td>{{$r->nombre}} {{$r->app}} {{$r->apm}}</td>
                <td>{{$r->esta}}</td>
                <td>{{$r->muni}}</td>
                <!--<td>{{$r->sexo}}</td>
                <td>{{$r->edad}}</td>-->
                <td>{{$r->colonia}}</td>
                <!--<td>{{$r->cp}}</td>-->
                <td>{{$r->nss}}</td>
                <td>{{$r->fechaingreso}}</td>
                <td>{{$r->horariotrabajo}}</td>
                <td>{{$r->ve}}</td>
                <td>{{$r->telemergencia}}</td>
                <td>
                    <a href="{{url("modrepar",['idrep'=>$r->idrep])}}">
                    <button type="button" class="btn btn-info">Modificar</button></a>
                @if ($r->deleted_at) 
                    <a href="{{url("actrepar",['idrep'=>$r->idrep])}}">
                    <button type="button" class="btn btn-warning">Activar</button> 
                </a>
                <a href="{{url("borrepar",['idrep'=>$r->idrep])}}">
                    <button type="button" class="btn btn-secondary">Borrar</button> 
                </a>
                @else
                    <a href="{{url("descrepar",['idrep'=>$r->idrep])}}">
                    <button type="button" class="btn btn-danger">Desactivar</button> 
                </a>
                @endif
                
            </td>
    
            </tr>

            @endforeach
        </tbody>
    </table>
@stop