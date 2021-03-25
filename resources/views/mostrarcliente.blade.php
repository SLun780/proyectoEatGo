@extends('navbar')

@section('contenido')
<?php $ubi='Registro de Cliente';?>

<body class="no-skin">

              <div class="row">
                <div class="col-xs-12">

                  <a href="{{url('registracliente')}}" class="btn btn-white btn-info btn-bold">
                    <i class="ace-icon fa fa-pencil-square-o bigger-120 blue"></i>
                    Nuevo Cliente</a>

                    @if(Session::has('message'))
                      <div class="alert alert-warning" >
                        <button type="button" class="close" data-dismiss="alert">
                          <i class="ace-icon fa fa-times"></i>
                        </button>
                        <strong>{{Session::get('message')}}</strong>
                        <br />
                      </div>
                    @endif
                    
                  <div class="clearfix">
                    <div class="pull-right tableTools-container"></div>
                  </div>
                  <div class="table-header">
                    Clientes Registrados
                  </div>

                  <!-- div.table-responsive -->

                  <!-- div.dataTables_borderWrap -->
                  <div>
                    
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><i class="ace-icon fa fa-picture-o bigger-110 hidden-480"></i> Foto</th>
                          <th><i class="ace-icon fa fa-user bigger-110 hidden-480"></i> Cliente</th>
                          <th><i class="ace-icon fa fa-calendar-o bigger-110 hidden-480"></i> Edad</th>
                          <th><i class="ace-icon fa fa-phone bigger-110 hidden-480"></i> Telefono</th>
                          <th><i class="ace-icon fa fa-globe bigger-110 hidden-480"></i> Estado</th>
                          <th><i class="ace-icon fa fa-map-marker bigger-110 hidden-480"></i> Municipio</th>
                          <th><i class="ace-icon fa fa-street-view bigger-110 hidden-480"></i> Dirección</th>
                          <th><i class="ace-icon fa fa-envelope-o bigger-110 hidden-480"></i> Correo</th>
                          <th><i class="ace-icon fa fa-cog bigger-110 hidden-480"></i> Operacion</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($clientes as $c)
                        <tr>
                          <td><img src="{{asset('archivos/'.$c->foto)}}" height="50" width="50"></td>
                          <td>{{$c->nombre}} {{$c->app}} {{$c->apm}}</td>
                          <td>{{$c->edad}}</td>
                          <td>{{$c->telefono}}</td>
                          <td>{{$c->estado->estado}}</td>
                          <td>{{$c->municipio->municipio}}</td>
                          <td>{{$c->colonia}} {{$c->calle}}</td>

                          <td>{{$c->correo}}</td>
                          <td>
                            <div class="hidden-sm hidden-xs action-buttons center">
                              <a class="green" href="{{route('modcliente',['idcli'=>$c->idcli])}}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>Modificar
                              </a>
                              @if($c->deleted_at)
                              <a class="orange" href="{{route('activac',['idcli'=>$c->idcli])}}">
                                <i class="ace-icon fa fa-check-circle-o bigger-130"></i>Activar
                              </a>
                              <a class="red" href="{{ route('borrarc', $c->idcli) }}">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>Eliminar
                              </a>
                                @else
                              <a class="blue" href="{{route('desactivac',['idcli'=>$c->idcli])}}">
                                <i class="ace-icon fa fa-times-circle-o bigger-130"></i>Desactivar
                              </a>
                              @endif
                            </div>
                            <div class="hidden-md hidden-lg">
                              <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                  <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                  <li>
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                      <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                      <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                      <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                      </span>
                                    </a>

                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    {{$clientes->render()}}
                  </div>
                </div>
              </div>

@stop
