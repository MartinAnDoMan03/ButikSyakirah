@extends('layouts.layout')

@section('title', 'login')

@section('content')

		<div class="wrapper" style="background-image: url('images/back1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/loginregist.jpg" alt="">
				</div>
				<form action="">
					<h3>Login</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="button-container">
						<button> 
							<a href="adminpage.html">Login</a>
							<i class="zmdi zmdi-arrow-right"></i>
						</button>
						<p class="signup-text">
							Belum punya akun? <a href="register.html">Sign Up</a>
						</p>	
					</div>			  
				</form>
			</div>
		</div>
@endsection