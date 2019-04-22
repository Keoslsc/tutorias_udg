@extends('layouts.app')

@section('content')
<div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">

                    @if(isset($division))
                    <form action="{{ route('division.update', $division->id) }}" method="POST"class="card">
                        <input type="hidden" name="_method" value="PATCH">
                        <h4 class="m-2 text-center">Change data for division : {{ $division->id }}</h4>
                    @else
                        <form action="{{ route('division.store') }}" method="POST"class="card" >
                    @endif
                    <form method="POST" action="{{ route('division.store') }}" class="card">
                        @csrf
                        <div class="card-body">
                        
                            <div class="card-title text-center">
                                <h4>Divisions Form</h4>
                            </div>

                            <div class="row">
                                
                                @if(session()->has('success'))
                                <div class="col-md-12 py-4">
                                    <div class="alert alert-info" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                    </div>
                                @endif
                            
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">{{ __('Description division (MAX: 60 Characteres)') }}</label>
                                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                                            required autofocus>{{ isset($division) ? $division->description : old('description') }}</textarea>
                                
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <a href="{{ route('division.index') }}" class="btn btn-danger btn-block">
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