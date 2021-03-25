@extends('navbar')
@section('contenido')
<?php $ubi='modificacion';?>
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" action="{{route('guardacares')}}" method="POST" enctype='multipart/form-data'>
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Clave del restaurante*:

                @if ($errors->first('idres'))
                <p class="text-danger">{{$errors->first('idres')}}</p>
                @endif

                </label>

                <div class="col-sm-9">
                    <input type="text" name='idres' id="idres" value="{{$restaurante->idres}}" placeholder="Clave de restaurante" class="col-xs-10 col-sm-5" readonly/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre del restaurante*:

                @if ($errors->first('res'))
                <p class="text-danger">{{$errors->first('res')}}</p>
                @endif

                </label>

                <div class="col-sm-9">
                    <input type="text" name='res'id="res" value="{{$restaurante->razonsocial}}" placeholder="Razon social" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre del contacto*: 
                    @if ($errors->first('nombrecont'))
                    <p class="text-danger">{{$errors->first('nombrecont')}}</p>
                    @endif
                </label>

                <div class="col-sm-9">
                    <input type="text" value="{{$restaurante->nombrecontacto}}" name='nombrecont' id="nombrecont" placeholder="Contacto" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Correo*: 
                    @if ($errors->first('correo'))
                    <p class="text-danger">{{$errors->first('correo')}}</p>
                    @endif
                </label>

                <div class="col-sm-9">
                    <input type="email" value="{{$restaurante->correo}}"name='correo'id="correo" placeholder="example@example.com" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Numero telefonico*:
                    @if ($errors->first('telefono'))
                    <p class="text-danger">{{$errors->first('telefono')}}</p>
                    @endif    
                </label>

                <div class="col-sm-9">
                    <input type="text" value="{{$restaurante->telefono}}"name='telefono'id="telefono" placeholder="Telefono" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> RFC*: 
                    @if ($errors->first('rfc'))
                    <p class="text-danger">{{$errors->first('rfc')}}</p>
                    @endif
                </label>

                <div class="col-sm-9">
                    <input type="text" value="{{$restaurante->rfc}}"name='rfc'id="rfc" placeholder="RFC" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Codigo postal*: 
                    @if ($errors->first('cp'))
                    <p class="text-danger">{{$errors->first('cp')}}</p>
                    @endif
                </label>

                <div class="col-sm-9">
                    <input type="text" value="{{$restaurante->cp}}"name='cp'id="cp" placeholder="Codigo postal" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Categoria*: 
                    @if ($errors->first('categoria'))
                    <p class="text-danger">{{$errors->first('categoria')}}</p>
                    @endif
                </label>
                <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name='cate' >
                    <option value="{{$restaurante->idcate}}">{{$restaurante->categoria}}</option>
                    @foreach($categoria as $cat)
                    <option value="{{$cat->idcat}}">{{$cat->categoria}}</option>
                    @endforeach				
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Municipio*: 
                    @if ($errors->first('municipio'))
                    <p class="text-danger">{{$errors->first('municipio')}}</p>
                    @endif
                </label>
                <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5"  name='muni' >
                    <option value="{{$restaurante->idmuni}}">{{$restaurante->municipio}}</option>
                    @foreach($municipio as $mun)
                    <option value="{{$mun->idmun}}">{{$mun->municipio}}</option>
                    @endforeach			
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Estado*: 
                    @if ($errors->first('estado'))
                    <p class="text-danger">{{$errors->first('estado')}}</p>
                    @endif
                </label>
                <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name='esta' >
                    <option value="{{$restaurante->idesta}}">{{$restaurante->estado}}</option>
                    @foreach($estado as $est)
                    <option value="{{$est->idest}}">{{$est->estado}}</option>
                    @endforeach				
                </select>
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
                <div class="col-sm-6">
                  <input type="file" class="col-xs-2 col-sm-6" id="id-input-file-2" name="foto"/>
                  <img src="{{asset('archivos/'.$restaurante->img)}}" height="150" width="150">
                </div>
            </div>

            <div class="space-4"></div>

                <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Guardar
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Cancelar
                    </button>
                </div>
            </div>

            

            

            

            

            

            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        

        

        
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection