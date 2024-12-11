<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        
        <!--===============================================================================================-->	
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animate/animate.css') }}">
        <!--===============================================================================================-->	
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animsition/css/animsition.min.css') }}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/select2/select2.min.css') }}">
        <!--===============================================================================================-->	
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/daterangepicker/daterangepicker.css') }}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/util.css') }}">
        	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
        <!--===============================================================================================-->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="limiter">
                		<div class="container-login100">
                			<div class="wrap-login100">
                				<form action="{{ route('login') }}" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                					@csrf
									<span class="login100-form-title">
                						Sign In
                					</span>
                
                					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                						<input class="input100" type="text" name="phone" placeholder="Username">
                						<span class="focus-input100"></span>
                					</div>
                
                					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
                						<input class="input100" type="password" name="password" placeholder="Password">
                						<span class="focus-input100"></span>
                					</div>
                
                					<div class="text-right p-t-13 p-b-23">
                						<span class="txt1">
                							Forgot
                						</span>
                
                						<a href="#" class="txt2">
                							Username / Password?
                						</a>
                					</div>
                
                					<div class="container-login100-form-btn">
                						<button class="login100-form-btn">
                							Sign in
                						</button>
                					</div>
                
                					<div class="flex-col-c p-t-170 p-b-40">
                						<span class="txt1 p-b-9">
                							Don’t have an account?
                						</span>
                
                						<a href="#" class="txt3">
                							Sign up now
                						</a>
                					</div>
                				</form>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
        
        
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/bootstrap/js/popper.js') }}"></script>
        	<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/daterangepicker/moment.min.js') }}"></script>
        	<script src="{{ asset('admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/vendor/countdowntime/countdowntime.js') }}"></script>
        <!--===============================================================================================-->
        	<script src="{{ asset('admin/js/main.js') }}"></script>
        	
    </body>
</html>
