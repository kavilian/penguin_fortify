@extends('template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ asset('img/login.jpg') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    {{-- @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1>{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror --}}
                    <div class="card-body">
                        <div class="brand-wrapper">
                            {{-- <img src="{{ asset('img/logo.png')}}" alt="logo" class="logo"> --}}
                        </div>
                        <p class="login-card-description">Confirm your password</p>
                        <form method="POST" action="{{ url('user/confirm-password') }}">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="email" class="form-label">Email</label> --}}
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <input name="confirm" id="confirm" class="btn btn-primary login-btn mb-4" type="submit" value="Confirm">
                        </form>
                        
                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
