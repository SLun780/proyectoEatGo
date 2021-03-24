@extends('sistema.principal')

@section('contenido')
<center><h3>Modifica cliente</h3></center>

<form class="form-horizontal" action="{{ route('guardac',$clientes->idcli) }}" method="post" enctype='multipart/form-data'>
  @csrf


    @if(Session::has('message'))
      <div class="alert alert-success" >
        <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
        </button>
        {{Session::get('message')}}
        <br />
      </div>
    @endif


    <div class="form-group">
      @if($errors->first('nombre'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('nombre') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="nombre" value="{{$clientes->nombre}}" >
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('app'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('app') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido paterno: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="app" value="{{$clientes->app}}" >
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('apm'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('apm') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido materno: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="apm" value="{{$clientes->apm}}" >
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('sexo'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('sexo') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sexo: </label>
      <div class="radio">
        @if($clientes->sexo=='F')
        <label>
          <input type="radio" id="sexo1" class="ace" name="sexo" value="M" />
          <span class="lbl" for="sexo1"> Masculino</span>
        </label>
        <label>
          <input type="radio" id="sexo2" class="ace" name="sexo" value="F" checked=""/>
          <span class="lbl" for="sexo2"> Femenino</span>
        </label>
        @else
        <label>
          <input type="radio" id="sexo1" class="ace" name="sexo" value="M" checked=""/>
          <span class="lbl" for="sexo1"> Masculino</span>
        </label>
        <label>
          <input type="radio" id="sexo2" class="ace" name="sexo" value="F" />
          <span class="lbl" for="sexo2"> Femenino</span>
        </label>
        @endif
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('edad'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('edad') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Edad: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="edad" value="{{$clientes->edad}}" >
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('telefono'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('telefono') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telefono: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="telefono" value="{{$clientes->telefono}}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('estado'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('estado') }}
          <br />
        </div>
      @endif
      <label for="form-field-1" class="col-sm-3 control-label no-padding-right">Estado:</label>
      <div class="col-sm-9">
      <select class="col-xs-10 col-sm-10" name="idest">
        @foreach($estado as $est)
          <option value="{{ $est->idest }}" @if($est->idest == $clientes->idest) selected="selected" @endif>{{ $est->estado }}</option>
        @endforeach
      </select>
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('municipio'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('municipio') }}
          <br />
        </div>
      @endif
      <label for="form-field-1" class="col-sm-3 control-label no-padding-right">Municipio:</label>
      <div class="col-sm-9">
        <select name="idmun" class="col-xs-10 col-sm-10">
          @foreach($municipio as $mun)
            <option value="{{ $mun->idmun }}" @if($mun->idmun == $clientes->idmun) selected="selected" @endif>{{ $mun->municipio }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('colonia'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('colonia') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Colonia: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="colonia" value="{{$clientes->colonia}}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('calle'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('calle') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Calle y numero: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="calle" value="{{$clientes->calle}}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('cp'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('cp') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Código postal: </label>
      <div class="col-sm-9">
        <input type="text" class="col-xs-10 col-sm-10" name="cp" value="{{$clientes->cp}}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('foto'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('foto') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto de perfil: </label>
      <div class="col-sm-9">
        <img src="{{asset('archivos/'.$clientes->foto)}}" height="150" width="150">
        <input type="file" class="col-xs-6 col-sm-6" id="id-input-file-2" name="foto"/>
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('correo'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('correo') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo: </label>
      <div class="col-sm-9">
        <input type="email" class="col-xs-10 col-sm-10" name="correo" value="{{$clientes->correo}}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      @if($errors->first('contraseña'))
        <div class="alert alert-danger" >
          <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
          </button>
          {{ $errors->first('contraseña') }}
          <br />
        </div>
      @endif
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contraseña: </label>
      <div class="col-sm-9">
        <input type="password" class="col-xs-10 col-sm-10" name="contraseña" value="{{$clientes->contraseña}}">
      </div>
    </div>
    <center>
      <input class="btn btn-primary" type="submit" value="Enviar">
    </center>

</form>

@stop
