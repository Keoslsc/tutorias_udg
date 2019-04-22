@extends('layouts.app')

@section('content')
<div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">

                    @if(isset($module))
                    <form action="{{ route('module.update', $module->id) }}" method="POST"class="card">
                        <input type="hidden" name="_method" value="PATCH">
                        <h4 class="m-2 text-center">Change data for module : {{ $module->id }}</h4>
                    @else
                        <form action="{{ route('module.store') }}" method="POST"class="card" >
                    @endif
                    <form method="POST" action="{{ route('module.store') }}" class="card">
                        @csrf
                        <div class="card-body">
                        
                            <div class="card-title text-center">
                                <h4>Module Form</h4>
                            </div>

                            <div class="row">
                                
                                @if(session()->has('success'))
                                <div class="col-md-12 py-4">
                                    <div class="alert alert-info" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                    </div>
                                @endif
                            
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{ __('module Name') }}</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                            value="{{ isset($module) ? $module->name : old('name') }}" required autofocus>
                                
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="division_id" class="col-form-label">{{ __('Division') }}</label>
                                            <select name="division_id" id="division_id" class="form-control{{ $errors->has('division_id') ? ' is-invalid' : '' }}">
                                                <option value=""></option>
                                                @foreach ($divisions as $division)
                                                    @if (old('division_id') == $division->id)
                                                        <option value="{{ $division->id }}" selected>{{ $division->description }}</option>
                                                    @else
                                                        <option value="{{ $division->id }}" {{ isset($module) ? $module->division_id == $division->id ? 'selected' : '' : ''}}>{{ $division->description }}</option>
                                                    @endif
                                                    
                                                @endforeach
                                            </select>
                                    
                                            @if ($errors->has('division_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('division_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                <div class="col-md-5">
                                    <a href="{{ route('module.index') }}" class="btn btn-danger btn-block">
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