@extends('layouts.app')

@section('auth')
<div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-3">
           
            <h1 class="text-center pb-2">Tutories System</h1>
            @include('messages.messages')
            
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Register</h1>
                </div>
                <div class="card-body">

                    @if(isset($convocatory) && request()->is('register/tutor'))
                    <form method="POST" action="{{ route('register.tutor') }}">
                        <input type="hidden" name="convocatory_id" value={{ $convocatory->id }}>
                        <div class="form-group">
                            <p class="text-muted"><strong>Convocatory:</strong> {{ $convocatory->written }}</p>
                        </div>
                    @else  
                        <form method="POST" action="{{ route('register') }}">
                    @endif
                        @csrf
                        <!-- Name -->
                        <fieldset class="form-group">
                                <label>{{ __('Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </span>
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" placeholder="Enter your name" required autofocus>
                                
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <small class="text-muted">ex. Juan Pérez</small>
                        </fieldset>

                        <!-- Email -->
                        <fieldset class="form-group">
                            <label>{{ __('Email') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Enter your mail" required autofocus>
        
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <small class="text-muted">ex. mail@mail.com</small>
                        </fieldset>

                        <!-- Password -->
                        <fieldset class="form-group">
                            <label>{{ __('Password') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    value="{{ old('password') }}" placeholder="Enter password" required autofocus>
        
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </fieldset>
        
                        <!-- Password Confirm -->
                        <fieldset class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input id="password-confirm" type="password"
                                class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password_confirmation"
                                value="{{ old('password-confirm') }}"  placeholder="Confirm password" required autofocus>
                            </div>
                            <small class="text-muted">Minimum length 6 characters*</small>
                        </fieldset>

                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('login') }}" class="btn btn-danger btn-block">{{ __('Back') }}</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
