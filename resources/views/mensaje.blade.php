@extends('navbar')
@section('contenido')
<?php $ubi='';?>
    <div class=container>
        <H1>Proceso{{$proceso}}</H1>
        <br>
        @if($error==1)
        <div class="alert alert-success">{{$mensaje}}</div>
        @else
        <div class="alert alert-danger">{{$mensaje}}</div>
        @endif
    </div>
@endsection
