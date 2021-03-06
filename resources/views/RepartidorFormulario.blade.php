
@extends('navbar')

@section('contenido')
<?php $ubi='Repartidor';?>

    

		<div class="container">
			<div class="page-header">
				<h1>
					Alta Repartidor
									
				</h1>
			</div>				
		
		<br/>
		@if($errors->any())
			<div class="text-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if(session('mensaje'))
			<div class="alert alert-success">
				<p>{{ session('mensaje') }}</p>
			</div>
		@endif

			</div>					

	 <form action="{{route('guardarepar')}}"  method="POST" ENCTYPE="multipart/form-data" class="form-horizontal form-label-left" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="nombre" required> No. Repartidor: </label>
				<!--<div class="col-sm-9">-->
				<input type="text"  name="idrep" id="idrep" value="{{$idsigue}}" readonly='readonly' class="col-xs-10 col-sm-5">
				<!--</div>-->
			</div>


			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="nombre" required> Nombre: </label>
				<input type="text"  name="nombre" placeholder="Carlos" value="{{old('nombre')}}" class="col-xs-10 col-sm-5">
			</div>
			<br>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido Paterno: </label>
				<input type="text" name="app" value="{{old('app')}}" class="col-xs-10 col-sm-5" />
					
			</div>

			<br>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Apellido Materno: </label>
				<input type="text" name="apm" value="{{old('apm')}}" class="col-xs-10 col-sm-5" />
			</div>			
			
				<div class="row">					
					
					<label class="col-md-3 col-sm-2 col-xs-12 control-label" name="sexo" >Sexo: </label>
					<div class="checkbox" >
						<label>
							<input type="radio" name="sexo" value="Femenino" value="{{old('sexo')}}"class="flat" checked="checked"/>
									Femenino
							</label>
							<label>
								<input type="radio" name="sexo" value="Masculino" value="{{old('sexo')}}"class="flat"/>
									Maculino 
							</label>
						</div>
					<br>
				</div>
				
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Edad: </label>
						<input type="text" name="edad" value="{{old('edad')}}" class="col-xs-10 col-sm-5" />
					</div>
			

				  <div class='form-group'>
				   <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha de Nacimiento:</label>
					  <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
						  <?php $date = date('d/m/y', strtotime('1 day')) ?>
						  <input type="date" name="fechanacimiento" value="{{old('fechanacimiento')}}"class="form-control has-feedback-left">
						<span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
					  </div>
				  </div>


					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Numero de Seguro Social: </label>
						<input type="text" name="nss" value="{{old('nss')}}" class="col-xs-10 col-sm-5" />
					</div>
			
			 
			 <div class="form-group">
				<label for="form-field-select-1" class="col-sm-3 control-label no-padding-right" name="idest">Estado:</label>
				 <select name="idest" lass="col-xs-10 col-sm-5" id="form-field-select-1">  
					@foreach ($estado as $e1)
						<option value="{{$e1->idest}}"> {{$e1->estado}} </option>
					@endforeach
				 </select>
			 </div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" name="idmun" for="form-field-select-1">Municipio</label>							
					<select name="idmun" value="{{old('idmun')}}"class="col-xs-10 col-sm-5" id="form-field-select-1">  
						@foreach ($municipio as $m1)
							<option value="{{$m1->idmun}}"> {{$m1->municipio}} </option>
						@endforeach
					</select>								
			</div>
						

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Calle</label>
				<input type="text" name="calle" value="{{old('calle')}}" class="col-xs-10 col-sm-5" />
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Colonia</label>
				<input type="text" name="colonia" value="{{old('colonia')}}" class="col-xs-10 col-sm-5" />
			</div>
				
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> C.P</label>
				<input type="text" name="cp" value="{{old('cp')}}" class="col-xs-10 col-sm-5" />
			</div>
			
			<div class="form-group">
				<label class="col-md-3 col-sm-2 col-xs-12 control-label" name="horariotrabajo" >Horario de Trabajo </label>
					<label>
						<input type="radio" name="horariotrabajo" value="Ma??ana" class="flat" checked="checked"/>
							08:00 a.m. - 4:00 p.m
					</label>
					<label>
						<input type="radio" name="horariotrabajo" value="Tarde" class="flat"/>
							4:00 p.m -12:00 a.m  </td>
					</label>
					</div>
					

				<div class='form-group'>
				   <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha de Ingreso:</label>
					  <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
						  <?php $date = date('d/m/y', strtotime('1 day')) ?>
						  <input type="date" name="fechaingreso" value="{{old('fechaingreso')}}" class="form-control has-feedback-left">
						<span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
					  </div>
				</div>
				

				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" name="idve" for="form-field-select-1">Vehiculo</label>		
						<select name="idve" class="col-xs-10 col-sm-5" id="form-field-select-1">  
							@foreach ($vehiculo as $v1)
								<option value="{{$v1->idve}}">
								{{$v1->vehiculo}} </option>
							@endforeach
						</select>
								
				</div>
			
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Foto perfil: 
				@if ($errors->first('img'))
				<p class="text-danger">{{ $errors->first('img') }}</p>	
				@endif</label>
				<input type="file" name="img" value="" class="col-xs-10 col-sm-5" />
			</div>
			

					<h3>En caso de emergencia llamar a:</h3>
					
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="Nombre" required> Nombre </label>
				<input type="text"  name="nombremergencias" value="{{old('nombremergencias')}}" class="col-xs-10 col-sm-5">
			 </div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Telefono:</label>
					<input type="text" name="telemergencia" value="{{old('telemergencia')}}" class="col-xs-10 col-sm-5" />
				</div>
					
				
			<div class="form-group">
				<input type="checkbox" name="id_aviso" value="2" checked>Acepto el <n><a href="Aviso_Privacidad.blade.php"> Aviso de privacidad</a></n>
					<select name="id_aviso">  
						@foreach ($aviso as $a1)
							<option value="{{$a1->id_Aviso}}"> {{$a1->aviso}} </option>
						@endforeach
					</select>				
			</div>
					


					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">	
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button class="btn" type="reset">
							<a href="RegistroRepartidores"><i class="ace-icon fa fa-undo bigger-110">Cancelar</i>
							</button>
						</div>
					</div>
		</form>	
	
</html>
@stop