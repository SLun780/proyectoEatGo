
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
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Login 2FA') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('login.2fa',$user->id) }}" aria-label="{{ __('Login') }}">
              @csrf
              <div class="form-group row">
                <div class="col-lg-4">
                  <img id="imgQR" src="{{$urlQR}}"/>
                </div>
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="code_verification" class="col-form-label">
                      {{ __('CÓDIGO DE VERIFICACIÓN') }}
                    </label>
                    <input 
                      id="code_verification" 
                      type="text" 
                      class="form-control{{ $errors->has('code_verification') ? ' is-invalid' : '' }}" 
                      name="code_verification"
                      value="{{ old('code_verification') }}" 
                      required
                      autofocus>
                    @if ($errors->has('code_verification'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code_verification') }}</strong>
                      </span>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary">ENVIAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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