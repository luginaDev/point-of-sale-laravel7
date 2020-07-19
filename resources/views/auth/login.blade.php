<!DOCTYPE html>
<html>

<head>
  <title>POSUI</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="r0jm9Q0QbgITp1DcHcjKFqH5SWUojoCavOOjQpPs">
  
  <link rel="shortcut icon" href="../favicon.ico">

  <!-- plugin css -->
  <link href="{{ asset('/assets/fonts/feather-font/css/iconfont.css')}}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" />
  <!-- end plugin css -->

  
  <!-- common css -->
  <link href=" {{ asset('assets/css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  </head>
<body data-base-url="">

  <script src="{{ asset('/assets/js/spinner.js')}}"></script>

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url(/assets/images/carousel/img6.jpg)">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">POS<span>UI</span></a>
              @include('layouts.message')
              <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
            
              <form class="forms-sample" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                </div>

                <div class="mt-3">
                  
                  <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="arrow-right-circle"></i>
                    Login 
                  </button>
                </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('/assets/plugins/feather-icons/feather.min.js')}}"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('/assets/js/template.js')}}"></script>
    <!-- end common js -->

    </body>


</html>