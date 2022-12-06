@extends('layout')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('failed'))
                    <div class="alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                @if (session('notAllowed'))
                    <div class="alert alert-danger">
                        {{ session('notAllowed') }}
                    </div>
                @endif
<div class="container reglogcard mt-5" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fa fa-facebook" ></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text"  placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="/register">Sign Up</a>
			
		</form>

	</div>
	<div class="form-container sign-in-container">
		<form method="POST" class="form-log" action="{{route('login.post') }}">
            @csrf
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fa-brands fa-facebook"></i></a>
				<a href="#" class="social"><i class="fa-brands fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
			</div>
			<br>
			<span>or use your account</span>
			<input type="email" name="email" placeholder="Email" />
			<br>
			<input type="password" name="password" placeholder="Password" />
			<br>
			<button class="ghost">Sign In</button>
			<a class="pw" href="#">Forgot your password?</a>
			<a class="font"  href="/register">Create an account?</a>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
				<p>To keep connected with us please login with your personal info</p>
				<button type="submit" class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<a href="/register"><button class="ghost" id="signUp">Sign Up</button></a>
			</div>
		</div>
	</div>
</div>
@endsection