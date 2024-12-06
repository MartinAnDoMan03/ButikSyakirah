@extends('layouts.layout')

@section('title', 'Register')

@section('content')

		<div class="wrapper" style="background-image: url('images/back1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/loginregist.jpg" alt="">
				</div>
				<form action="">
					<h3>Registration</h3>
					<div class="form-wrapper">
						<input type="text" name="userName" placeholder="Nama" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="userUsername" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="userPhone" placeholder="No HP" class="form-control">
						<i class="zmdi zmdi-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button> <a href="login.html">Register</a>
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
@endsection