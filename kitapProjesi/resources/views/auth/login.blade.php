@extends('layouts.app')

@section('content')

<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="{{route('index')}}">Anasayfa</a></li>
					<li class="active">Giriş yap</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="account">
		<div class="container">
		<div class="account-top heading">
				<h2>Giriş yap</h2>
			</div>
			<div class="account-main">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
				<div class="col-md-6 account-left">
					<h3>Mevcut kullanıcı</h3>
					<div class="account-bottom">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
						<input name="email" value="{{ old('email') }}" placeholder="Email" type="text" name="email" value="{{ old('email') }}" tabindex="3" required>
						@error('email')
                          <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                          </span>
                                @enderror
                        
                        <input placeholder="Password" name="password" type="password" tabindex="4" required>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        <div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login">
						</div>
                    </form>
					</div>
				</div>
				<div class="col-md-6 account-right account-left">
					<h1>Kullanıcı değilmisiniz kayıt ol</h1>

					<a href="{{route('register')}}">Kayıt ol</a>
				</div>
				<div class="clearfix"></div>
            </form>
			</div>
		</div>
	</div>

@endsection
