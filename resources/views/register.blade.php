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
					<!-- <div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> -->
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
					<!-- <div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Position</option>
							<option value="male">Owner</option>
							<option value="femal">Kasir</option>
							<option value="other">Pekerja</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> -->
					<button> <a href="login.html">Register</a>
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
@endsection