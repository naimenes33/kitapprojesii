@extends('layouts.app')

@section('content')

<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="{{route('index')}}">Anasayfa</a></li>
					<li class="active">Kayit ol</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Kayit ol</h2>
			</div>
            <form method="POST" action="{{ route('register') }}">
             @csrf

			<div class="register-main">
				<div class="col-md-6 account-left">
				
                    <input placeholder="Adınız" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
               @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
               @enderror


               <input placeholder="Email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name') }}" required>
               @error('email')
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                   </span>
                @enderror
					<input id="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" type="password" tabindex="4" required>
                    @error('password')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                         </span>
                    @enderror

                        <input id="password-confirm" placeholder="Şifreniz tekrar giriniz" type="password" name="password_confirmation" required>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
				<input type="submit" value="Submit">
			</div>
            </form>
		</div>
	</div>

        
@endsection
