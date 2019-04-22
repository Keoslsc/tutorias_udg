@extends('layouts.app')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="POST" action="{{  route('password.email') }}" class="card">
                    @csrf
                    <div class="card-body">

                        <div class="card-title text-center">
                                <h4>{{ __('Reset Password') }}</h4>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
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

                    <div class="form-group mb-0">
                        <a class="btn btn-danger btn-block" href="{{ route('login') }}"> {{ __('Back') }}</a>
                        <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Send Password Reset Link') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
