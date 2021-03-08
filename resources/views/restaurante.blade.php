@extends('navbar')
@section('contenido')
<?php $ubi='Restaurante';?>
    <div class="row">
        <div>
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Clave del restaurante</th>
                            <th>Nombre Restaurante</th>
                            <th>Nombre de la referencia</th>
                            <th class="hidden-480">Correo</th>
                            <th>Telefono</th>
                            <th class="hidden-480">RFC</th>
                            <th>Codigo Postal</th>
                            <th>Categoria</th>
                            <th>Municipio</th>
                            <th>Operacion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($resta as $res)
                        <tr>
                            <td class="center">{{$res->idres}}</td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons center">

                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
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
                        @endforeach
                        <tr>
                            <td class="center">
                                
                            </td>

                            <td>
                                Juan
                            </td>
                            <td>Perez</td>
                            <td >Perez</td>
                            <td>Masculino</td>

                            <td >
                                Hola
                            </td>

                            
                        </tr>

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection