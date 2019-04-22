@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        
        <div class="row justify-content-center">
            <div class="col-md-4 m-2 text-center">
                <h4>Profile Form</h4>
            </div>
        </div>
        <div class="card">
        @if(session()->has('success'))
        <div class="col-md-12 py-4 text-center">
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }} <i class="icon-check"></i>
            </div>
            </div>
        @endif
        @if(isset($profile))
            <form action="{{ route('profile.update', $profile->user_id) }}" method="POST" class="card-body" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
        @else
            <form action="{{ route('profile.store') }}" method="POST" class="card-body" enctype="multipart/form-data">
        @endif
                @csrf
                
                <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                <div class="row justify-content-center">
                    <div class="col-md-4 m-2">
                        <img class="img-circle" src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" >
                    </div>
                </div>


                

                 <!-- Picture -->
                 <div class="input-group mb-3">
                    <input id="avatar" type="file" class="form-control-file{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" autofocus>
                    @if ($errors->has('avatar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                </div>


                <!-- Name -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
                    <input id="name" type="text"
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                        value="{{ isset( Auth::user()->name) ?  Auth::user()->name : old('name') }}" placeholder="Name" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <!-- Birthday -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                    </div>
                    <input id="date" type="date"
                        class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date"
                        value="{{ isset($profile->date) ? $profile->date : old('date') }}" placeholder="date" required autofocus>

                    @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif
                </div>

                <!-- About Me -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-heart"></i></span>
                    </div>
                    <textarea class="form-control{{ $errors->has('about_me') ? ' is-invalid' : '' }}" name="about_me" id="about_me" cols="5" rows="5" placeholder="About Me" style="resize: none;">{{ isset($profile->about_me) ? $profile->about_me : old('about_me') }}</textarea>
                    
                    @if ($errors->has('about_me'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('about_me') }}</strong>
                    </span>
                    @endif
                </div>
                
                <!-- Cellphone -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-screen-smartphone"></i></span>
                    </div>
                    <input id="cellphone" type="number"
                        class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone"
                        value="{{ isset($profile->cellphone) ? $profile->cellphone : old('cellphone') }}" placeholder="Cellphone" required autofocus>

                    @if ($errors->has('cellphone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cellphone') }}</strong>
                    </span>
                    @endif
                </div>

                <!-- Career -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-graduation"></i></span>
                    </div>
                    <select name="career_id" id="career_id" class="form-control{{ $errors->has('career_id') ? ' is-invalid' : '' }}">
                        <option value=""></option>
                        @foreach ($careers as $career)
                            <option value="{{ $career->id }}" {{ isset($profile) ? $profile->career_id == $career->id ? 'selected' : '' : '' }}>{{ $career->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('career_id"'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('career_id"') }}</strong>
                    </span>
                    @endif
                </div>

                <!-- Gender -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-people"></i></span>
                    </div>
                    <select id="G" class="form-control{{ $errors->has('G') ? ' is-invalid' : '' }}" name="G" placeholder="Gender" required autofocus>
                        <option value="O" {{ isset($profile->G) ? $profile->G == 'O' ? 'selected' : '' : old('G') == 'O' ? 'selected' : '' }}>It is not necessary</option>
                        <option value="M" {{ isset($profile->G) ? $profile->G == 'M' ? 'selected' : '' : old('G') == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ isset($profile->G) ? $profile->G == 'F' ? 'selected' : '' : old('G') == 'F' ? 'selected' : '' }}>Female</option>
                    </select>

                    @if ($errors->has('G'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('G') }}</strong>
                    </span>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-md-5">
                            <a href="{{ route('profile.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </div>
                

                
            </form>
        </div>
    </div>
</div>

    
@endsection