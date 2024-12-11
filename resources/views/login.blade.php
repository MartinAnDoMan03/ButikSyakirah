@extends('layouts.layoutlogin')

@section('title', 'Login')

@section('content')
<div class="inner">
    <div class="image-holder">
        <img src="images/foto1.jpg" alt="">
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h3>Login</h3>
        <div class="form-wrapper">
            <input type="text" name="username" placeholder="Username" class="form-control" required>
            <i class="zmdi zmdi-account"></i>
        </div>
        <div class="form-wrapper">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <div class="button-container">
            <button type="submit">
                Login
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
            <p class="signup-text">
                Belum punya akun? <a href="{{ route('register') }}">Sign Up</a>
            </p>  
        </div>        
    </form>
</div>
@endsection
