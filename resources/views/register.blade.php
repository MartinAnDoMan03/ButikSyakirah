@extends('layouts.layoutlogin')

@section('title', 'Register')

@section('content')

<div class="inner">
	<div class="image-holder">
		<img src="images/foto1.jpg" alt="">
	</div>
	<form action="">
		<h3>Registration</h3>
		<div class="form-wrapper">
			<input type="text" placeholder="Nama" class="form-control" required>
			<i class="zmdi zmdi-account"></i>
		</div>
		<div class="form-wrapper">
			<input type="text" placeholder="Username" class="form-control" required>
			<i class="zmdi zmdi-account"></i>
		</div>
		<div class="form-wrapper">
			<input type="text" placeholder="No HP" class="form-control" required>
			<i class="zmdi zmdi-phone"></i>
		</div>
		<div class="form-wrapper">
			<input type="password" placeholder="Password" class="form-control" required>
			<i class="zmdi zmdi-lock"></i>
		</div>
		{{-- <div class="form-wrapper">
			<input type="password" placeholder="Confirm Password" class="form-control">
			<i class="zmdi zmdi-lock"></i>
		</div> --}}
		<div class="form-wrapper">
			<select name="" id="" class="form-control" required>
				<option value="" disabled selected>Position</option>
				<option value="male">kasir</option>
				<option value="femal">pengunting</option>
				<option value="other">Penjahit</option>
				<option value="other">Pemayet</option>
			</select>
			<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
		</div>
		<button>Register
			<i class="zmdi zmdi-arrow-right"></i>
		</button>
	</form>
</div>
@endsection