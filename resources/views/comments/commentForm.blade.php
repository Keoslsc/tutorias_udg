
@extends('layouts.app')

@section('content')
<div class="m-3 container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                        <h4 class="text-center">Comment for {{ $post->name}}</h4>
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" placeholder="Write your comment" value="{{ old('body') }}" name="body" id="body" required>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="post_id" id="comment_id" value="{{ $post->id }}">                        
                    
                            @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <button class="btn btn-primary float-right">Comment</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection