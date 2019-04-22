@extends('layouts.app')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mx-4">
                    @if ($convocatory && request()->is('register/tutor'))
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
                                @if(session()->has('Registered'))
                                <div class="form-group">
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('Registered') }}
                                    </div>
                                </div>
                                @endif
                            @else  
                                <div class="card-title text-center">
                                    <h4>{{ __('Student Register') }}</h4>
                                </div>
                                <hr>
                            @endif
    
                            


                            <!-- Name -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" placeholder="Name" required autofocus>
    
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
    
                            <!-- Email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autofocus>
        
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <!-- Password -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    value="{{ old('password') }}" placeholder="Password" required autofocus>
        
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
    
                            <!-- Password Confirm -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input id="password-confirm" type="password"
                                class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password_confirmation"
                                value="{{ old('password-confirm') }}"  placeholder="Repeat password" required autofocus>
                            </div>

                            <div class="form-group mb-0">
                                <a class="btn btn-danger btn-block" href="{{ route('login') }}"> {{ __('Back') }}</a>
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
    
                        </div>
    
                    </form>
            
                </div>
            </div>
        </div>
    </div>
@endsection
