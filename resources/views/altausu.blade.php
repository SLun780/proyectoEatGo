
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{asset('font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset('css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{asset('css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{asset('css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{asset('js/ace-extra.min.js')}}"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>



<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>


<body background='blue'>
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                        <h2 class="h4 text-gray-900 mb-4">Registrarse</h2>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" role="form" action="{{route('guardausua')}}"  method="POST">
                                            {{csrf_field()}}
                                            <div class="form-group input-group">
                                                <label class="custom-control-label" for="form-field-1"> Usuario: 
                                                    @if ($errors->first('usuario'))
                                                    <p class="text-danger">{{$errors->first('usuario')}}</p>
                                                    @endif
                                                </label>
                        
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="text" value='{{old('usuario')}}' name='usuario' id="usuario" placeholder="Usuario" class="custom-control-input" />
                                                </div>
                                            </div>

                                            <div class="form-group input-group">
                                                <label class="custom-control-label" for="form-field-1"> Correo: 
                                                    @if ($errors->first('correo'))
                                                    <p class="text-danger">{{$errors->first('correo')}}</p>
                                                    @endif
                                                </label>
                        
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="text" value='{{old('correo')}}' name='correo' id="correo" placeholder="Correo" class="custom-control-input" />
                                                </div>
                                            </div>

                                            <div class="form-group input-group">
                                                <label class="custom-control-label" for="form-field-1"> Cotrase??a: 
                                                    @if ($errors->first('contrase??a'))
                                                    <p class="text-danger">{{$errors->first('contrase??a')}}</p>
                                                    @endif
                                                </label>
                        
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="text" value='{{old('contrase??a')}}' name='contrase??a' id="contrase??a" placeholder="Contrase??a" class="custom-control-input" />
                                                </div>
                                            </div>

                                            <div class="from-group ">
                                                <div class='col'>
                                                    <div>
                                                        <div class="g-recaptcha" data-sitekey="6LfSaWoaAAAAAPtXIvIuDIsIMHURQ7V06a0xTh-e"></div>
                                                        @if ($errors->has('g-recaptcha-response'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group input-group">
                                                <label class="custom-control-label" for="form-field-1">Acepto <a href="{{route('politicaspriva')}}">politias de privacidad</a>
                                                    @if ($errors->first('politica'))
                                                    <p class="text-danger">{{$errors->first('politica')}}</p>
                                                    @endif
                                                </label>
                        
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" value='{{old('politica')}}' name='politica' id="politica" placeholder="Contrase??a" class="custom-control-input" />
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
                                        </form>
                                        <div>
                                            <a href="{{route('login')}}">Iniciar session</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{asset('js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('/js/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('/js/jquery.sparkline.index.min.js')}}"></script>
<script src="{{asset('/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('/js/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('/js/jquery.flot.resize.min.js')}}"></script>

<!-- ace scripts -->
<script src="{{asset('js/ace-elements.min.js')}}"></script>
<script src="{{asset('js/ace.min.js')}}"></script>