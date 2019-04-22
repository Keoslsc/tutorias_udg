@extends('layouts.app')

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" >
                            <h1>Login</h1>
                            <p>Sign In to Your account</p>
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
                                    <button class="btn btn-primary px-4" type="submit" >{{__('Login')}}</button>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                
                                </div>
                            </div>
                        
                        </form>
                        
                    </div>
                </div>

                <!-- Registro for students -->
                <div class="card text-white bg-primary py-5 " style="width:100%">
                    <div class="card-body text-center">
                        <div>
                        <h2>Sign up as a student</h2>
                        <p>This application is to support students</p>
                        <a href="{{ route('register') }}" class="btn btn-primary active mt-3" type="button">Register Now!</a>
                        </div>

                        <!-- Registro para tutores-->
                        @if($convocatory) 
                        <div class="card-body text-center">
                            <div>
                                <h2><span class="badge badge-warning">NEW</span> Do you want to be a tutor?</h2>
                                <p>{{ $convocatory->written }}</p>
                                <a href="{{ route('register.tutor') }}" class="btn btn-primary active mt-3" type="button">Register Here!</a>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
                
                

            </div>
        </div>
    </div>
</div>
@endsection
