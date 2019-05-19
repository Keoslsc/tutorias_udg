@extends('layouts.app')

@section('content')
<div class="m-3 container-fluid">
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
                                    By: <a href=" {{ route('profile.show', $post->user->id) }} "> <h5 class="m-0">{{ $post->user->name }}</h5> </a>
                                @endif
                                <P class="m-0">{{ $post->user->profile->career->name }}</P>
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
                    @if (count($post->files) > 0)
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
                <div class="card-footer text-muted">                
                    <form action="{{ route('posts.post') }}" method="POST">
                    {{ csrf_field() }}
                    @for ($i = 0; $i < round( $post->averageRating ,0); $i++)
                                    <i class="fa fa-star fa-lg" style="color:#d8ca5d"></i>
                                    @endfor
                    @for ($i = round($post->averageRating,0); $i < 5 ;$i++)
                                    <i class="fa fa-star fa-lg" style="color:#afac95"></i>
                    @endfor
                    {{number_format($post->averageRating, 1, '.', '')}}
                        <input type="number" id="input" name="rate" min="1" max="5" style="width:3rem">                        
                        <input type="hidden" name="id" required="" value="{{ $post->id }}">
                        <button class="btn btn-success">Rate</button>
                    <form>
                </div>
            </div>
        </div>

    </div>    
</div>
@endsection