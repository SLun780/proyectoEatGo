@extends('navbar')
@section('contenido')
<?php $ubi='';?>
    <div class=container>
        <H1>Proceso{{$proceso}}</H1>
        <br>
        <div class="alert alert-success">{{$mensaje}}</div>
    </div>
@endsection
