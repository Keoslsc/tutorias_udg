@extends('layouts.app')

@section('content')
<div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form method="POST" action="{{ route('convocatory.store') }}" class="card">
                        @csrf
                        <div class="card-body">
                        
                            <div class="card-title text-center">
                                <h4>Convocatory</h4>
                            </div>

                            <div class="row">
                                
                                @if(session()->has('success'))
                                <div class="col-md-12 py-4">
                                    <div class="alert alert-info" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                    </div>
                                @endif
                                
                                @if(session()->has('Error'))
                                    <div class="col-md-12 py-4">
                                        <div class="alert alert-danger" role="alert">
                                            {{ session()->get('Error') }}
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="start" class="col-form-label">{{ __('Date to start') }}</label>
                                        <input id="start" type="date" class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                            name="start" value="{{ old('start') }}" required autofocus>
                                
                                        @if ($errors->has('start'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            
                            
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="end" class="col-form-label">{{ __('Date to end') }}</label>
                                        <input id="end" type="date" class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" name="end"
                                            value="{{ old('end') }}" required autofocus>
                                
                                        @if ($errors->has('end'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="written" class="col-form-label">{{ __('Text Convocatory') }}</label>
                                        <textarea id="written" class="form-control{{ $errors->has('written') ? ' is-invalid' : '' }}" name="written"
                                            required autofocus>{{ old('written') }}</textarea>
                                
                                        @if ($errors->has('written'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('written') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="{{ route('convocatory.index') }}" class="btn btn-danger btn-block">
                                            {{ __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Save') }}
                                    </button>
                                </div>

                            </div>
                        
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection