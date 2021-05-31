@extends('template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                
                <div class="col-md-712">
                    
                    <div class="card-body">
                        @if (! auth()->user()->two_factor_secret)
                            You have not enabled 2fa
                            <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enable</button>
                            </form> 
                        @else
                            You have enabled 2fa
                            <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-primary">Disable</button>
                            </form>
                        @endif

                        @if (session('status') == 'two-factor-authentication-enabled')
                            <p>You now have enabled 2fa, please scan the following QR  code into your phone's authenticator app</p>
                            {{!! auth()->user()->twoFactorQrCodeSvg() !!}}

                            <p>Please store these recovery codes in a secure location</p>
                            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                {{ trim($code) }} <br>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection