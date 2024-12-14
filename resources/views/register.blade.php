@extends('layouts.layoutlogin')

@section('title', 'Register')

@section('content')

<div class="inner">
	<div class="image-holder">
		<img src="images/foto1.jpg" alt="">
	</div>
	<form action="{{ route('register') }}" method="POST">
		@csrf
		<h3>Registration</h3>
			
			<div class="form-wrapper">
				<input type="text" name="name" placeholder="Nama" class="form-control" required>
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="form-wrapper">
				<input type="email" name="email" placeholder="Email" class="form-control" required>
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="form-wrapper">
				<input type="text" name="phone_number" placeholder="No HP" class="form-control" required>
				<i class="zmdi zmdi-phone"></i>
			</div>
			<div class="form-wrapper">
				<input type="password" name="password" placeholder="Password" class="form-control" required>
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="form-wrapper">
				<input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="form-wrapper">
				<select name="role" class="form-control" required>
					<option value="" disabled selected>Position</option>
					<option value="penggunting">Penggunting</option>
					<option value="penjahit">Penjahit</option>
					<option value="pemayet">Pemayet</option>
				</select>
				<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
			</div>
			@if ($errors->any())
			<div class="error-messages">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
	    <div class="button-container">
			<button type="submit">Register
				<i class="zmdi zmdi-arrow-right"></i>
			</button>
			<p class="signup-text">
                kembali ke <a href="{{ route('login') }}">Login</a>
            </p> 
		</div>
	</form>
	
</div>
@endsection