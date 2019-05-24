@extends('layouts.app')

@section('content')
<div class="m-3 container-fluid">
    <div class="row pb-3">

        <div class="col-4 col-sm-4 col-md-6 col-lg-8 col-xl-8">

        </div>
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            
        </div>
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            <a href=" {{ route('module.show', $post->module) }} " class="btn btn-danger btn-block">Go back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        @include('messages.messages')
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 d-none d-sm-none d-md-block ">
            @if (isset($post->user))
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Autor</h3>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-lg-2 d-none d-lg-block d-xl-none"></div>
                            <div class="col-md-2 d-none d-md-block d-lg-none"></div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-4 justify-content-center pt-2 pb-2">
                                <img class="rounded-circle" src="{{ Storage::url($post->user->avatar) }}"  style="width: 100%;">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 pt-2">
                                
                                @if($post->user->id == Auth::user()->id)
                                    Me
                                @else
                                     <a href=" {{ route('profile.show', $post->user->id) }} "> <h5 class="m-0">By: {{ $post->user->name }}</h5> </a>
                                @endif
                                @if(isset($post->user->profile))
                                    <p class="m-0">{{ $post->user->profile->career->name }}</p>
                                @endif
                                <p class="text-muted mb-0">{{ $post->user->roles->first()->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 d-none d-sm-block d-block d-sm-nonecol-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 d-none d-sm-block">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->name }}</h3>

                </div>
                <div class="card-body">
                    <p class="text-justify">{{ $post->description }}</p>
                    @if (isset($post->files))
                        <div class="justify-content-center table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Filename</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post->files as $file)
                                        <tr>
                                            <td>{{ $file->name }}</td>
                                            <td><a href=" {{ route('file.show', $file->id) }} " class="btn btn-primary btn-lg"><i class="icon-cloud-download"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                {<div class="card-footer">
                    @include('comments.commentForm', $post)
                </div>
                <div class="pre-scrollable">
                        @foreach ($post->comments as $comment)
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-3 col-sm-3 col-md-2 col-lg-1 col-xl-1">
                                    <img class="rounded-circle " src="{{ Storage::url($comment->user->avatar) }}" style="max-width: 100%;">
                                </div>
                                <div class="col-9 col-sm-3 col-md-10 col-lg-11 col-xl-11">
                                    @if($comment->user->id == Auth::user()->id)
                                        Me
                                    @else
                                        <a href=" {{ route('profile.show', $comment->user->id) }} "> <h5 class="m-0">{{ $comment->user->name }}</h5> </a>
                                    @endif
                                    
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                


            </div>
        </div>

    </div>    
</div>

@endsection