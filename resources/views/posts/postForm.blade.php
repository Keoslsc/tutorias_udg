@extends('layouts.app')

@section('content')
<form action=" {{ route('post.store') }} " method="POST" enctype="multipart/form-data">
    <nav class="navbar navbar-dark row" style="background-color: #343a40;">
        
        <div class="col-6 col-sm-8 col-md-8 col-lg-8 col-xl-10">
            <a class="navbar-brand" href="#">Create a new post!</a>
        </div>
        
        <div class="col-3 col-sm-2 col-md-2 col-lg-2 col-xl-1">
            <button class="btn btn-primary btn-block" type="submit" >To post</button>
        </div>
        <div class="col-3 col-sm-2 col-md-2 col-lg-2 col-xl-1">
            <a href=" {{ route('module.show', $module->id) }} " class="btn btn-danger btn-block">Go back</a>
        </div>
    </nav>

    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="module_id" value="{{ $module->id }}">
    
    <div class="row justify-content-center pt-4">
        <div class="col-10">
            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Title</span>
                </div>
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" 
                       name="name" id="name" aria-label="Large" value="{{ old('name') }}" 
                       aria-describedby="inputGroup-sizing-sm" required autofocus>
            </div>
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="col-10 pt-5">
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                      name="description" id="description" cols="30" rows="10" required 
                      placeholder="Write here the content of your post">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
            
        </div>
        
       <div class="col-10 pt-5">
           <!-- Files -->
           <div class="input-group mb-3">
                <div class="custom-file">
                    <input id="files" type="file" class="custom-file-input{{ $errors->has('files') ? ' is-invalid' : '' }}" name="files[]" required multiple>
                    <label class="custom-file-label" for="files">Choose file</label>
                </div>
                @if ($errors->has('files'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('files') }}</strong>
                    </span>
                @endif
            </div>
        </div> 

    </div>
</form>
@endsection