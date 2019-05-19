@extends('layouts.app')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mx-4">
                    @if (isset($convocatory) && request()->is('register/tutor'))
                        <form method="POST" action="{{ route('register.tutor') }}">
                    @else  
                        <form method="POST" action="{{ route('register') }}">
                    @endif
                        @csrf
                        <div class="card-body">

                            @if($convocatory &&  request()->is('register/tutor'))
                                <div class="card-title text-center">
                                    <h4>{{ __('Tutor Register') }}</h4>
                                </div>
                                <hr>
                                <input type="hidden" name="convocatory_id" value={{ $convocatory->id }}>
                                <div class="form-group">
                                    <label for="text_convocatoria" class="col-form-label">{{ __('Convocatory: ') }}</label>   
                                    <textarea class="form-control" name="text_convocatoria" id="text_convocatoria" cols="30" rows="2" disabled style="resize: none;">{{$convocatory->written}}</textarea>
                                </div>
                                
                            @include('messages.messages')
                            @else  
                                <div class="card-title text-center">
                                    <h4>{{ __('Student Register') }}</h4>
                                </div>
                                <hr>
                            @endif
    
                            


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
                                value="{{ old('password-confirm') }}"  placeholder="Repeat password" required autofocus>
                            </div>
                            <small class="text-muted">Minimum length 6 characters*</small>
                            </fieldset>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-secondary btn-block" href="{{ route('login') }}"> {{ __('Back') }}</a>
                            </div>
    
                        </div>
    
                    </form>
            
                </div>
            </div>
        </div>
    </div>
@endsection
