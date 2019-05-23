@extends('layouts.app')

@section('auth')
<div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-6">
        
        <h1 class="text-center pb-2">Tutories System</h1>
        @include('messages.messages')
        <div class="card-deck">
            {{-- Acces --}}
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">
                        Login
                    </h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="icon-user"></i>
                                </span>
                            </div>
                            <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                            <!-- Password -->
                            <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="icon-lock"></i>
                                </span>
                            </div>
                            <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <!-- Remember -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
        
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-block" type="submit" >{{__('Login')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Register --}}
            <div class="card text-white bg-primary">
                <div class="card-body text-center">

                    <div>
                        <h2>Sign up as a student</h2>
                        <p>This application is to support students</p>
                        <a href="{{ route('register') }}" class="btn btn-primary" type="button">Register Now!</a>
                    </div>

                    <!-- Registro para tutores-->
                    @if(isset($convocatory)) 
                        <div class="card-body text-center">
                            <div>
                                <h2><span class="badge badge-warning">NEW</span> Do you want to be a tutor?</h2>
                                <p class="text-muted text-truncate">{{ $convocatory->written }}</p>
                                <a href="{{ route('register.tutor') }}" class="btn btn-primary" type="button">Register Now!</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
