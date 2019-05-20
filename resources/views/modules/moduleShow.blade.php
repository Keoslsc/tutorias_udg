@extends('layouts.app')

@section('content')

<div class="m-3 container-fluid">

    @if (isset($module))
    <div class="row pb-4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-10 col-xl-10">
                <h2 class="text-truncate"><strong>{{ $module->name }}</strong></h2>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-1 col-xl-1">
                @if(Auth::user()->hasRole('tutor'))
                    <a href=" {{ route('post.create', $module->id) }} " class="btn btn-primary btn-block">Create Post</a>
                @endif
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-1 col-xl-1">
                <a href=" {{ route('divisions.modules', $module->id) }} " class="btn btn-danger btn-block"> Go Back</a>
            </div>
            
    </div>
        
        <div class="row justify-content-center">
            @include('messages.messages')
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 d-none d-sm-none d-md-block ">
                @foreach ($module->users as $user)
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-lg-2 d-none d-lg-block d-xl-none"></div>
                                <div class="col-md-2 d-none d-md-block d-lg-none"></div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-4 justify-content-center pt-2 pb-2">
                                    <img class="rounded-circle" src="{{ Storage::url($user->avatar) }}"  style="width: 100%;" alt=" {{ $user->name }} ">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 pt-2">
                                    
                                    @if($user->id == Auth::user()->id)
                                        Me
                                    @else
                                        <a href=" {{ route('profile.show', $user->id) }} "> <h5 class="m-0">{{ $user->name }}</h5> </a>
                                    @endif
                                    @if(isset($user->profile))
                                        <P class="m-0">{{ $user->profile->career->name }}</P>
                                    @endif
                                    <p class="text-muted mb-0">{{ $user->roles->first()->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (isset($module->posts))
                <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 d-none d-sm-block d-block d-sm-nonecol-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 d-none d-sm-block">
                    @foreach ($module->posts as $post)
                        <div class="card">
                            <div class="card-header">
                                {{ $post->name }}
                                <div class="card-header-actions">
                                {{number_format($post->averageRating, 1, '.', '')}}
                                 
                                 <!--value=-->
                                    @for ($i = 0; $i < round( $post->averageRating ,0); $i++)
                                    <i class="fa fa-star fa-lg" style="color:#d8ca5d"></i>
                                    @endfor
                                    @for ($i = round($post->averageRating,0); $i < 5 ;$i++)
                                    <i class="fa fa-star fa-lg" style="color:#afac95"></i>
                                    @endfor
                                                                    
                                 </div>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">{{ $post->description }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    
                                    @can('owner', $post)
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                            @if ($post->user->id == Auth::user()->id )
                                                Me
                                            @else
                                                <a href=" {{ route('profile.show', $post->user->id) }} " class="text-left">{{ $post->user->name }}</a>
                                            @endif
                                        </div>
                                        
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                            <a href=" {{ route('post.delete', $post->id) }} " class="btn btn-danger btn-block">Delete</a>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                            <a href=" {{ route('post.show', $post->id) }} " class="btn btn-success btn-block">View</a>
                                        </div>
                                   
                                        
                                    @else
                                    <div class="col-7 col-sm-7 col-md-8 col-lg-9 col-xl-10">
                                        @if ($post->user->id == Auth::user()->id )
                                            Me
                                        @else
                                            <a href=" {{ route('profile.show', $post->user->id) }} " class="text-left">{{ $post->user->name }}</a>
                                        @endif
                                    </div>
                                    
                                    <div class="col-5 col-sm-5 col-md-4 col-lg-3 col-xl-2">
                                        <a href=" {{ route('post.show', $post->id) }} " class="btn btn-success btn-block">View</a>
                                    </div>
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            @else
                <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 d-none d-sm-block d-block d-sm-none">
                    <h3 class="text-center"> There are no posts!</h3>
                </div> 
            @endif

        </div>
    @else
        <h3 class="text-center"> There are no data!</h3>
    @endif
</div>



@endsection