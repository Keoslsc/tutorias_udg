@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card">
                
                <div class="row justify-content-center">
                    <div class="col-md-4 m-2">
                        <img class="img-circle" src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" >
                    </div>
                </div>

                <div class="text-center">
                    <h2 class="card-title">{{ Auth::user()->name }}</h2>
                </div>

                <hr>
                <div class="card-body">
                    <h4>Information: </h4>
                    <h5 class="card-text"><i class="icon-envelope-open"></i> {{ Auth::user()->email }} </h5>
                    <h5 class="card-text"><i class="icon-badge"></i> {{ Auth::user()->roles->first()->description }} </h5>
                    <hr>

                   
                    @if(isset(Auth::user()->profile))
                        <h4>About me: </h4>
                        <h5 class="card-text"><i class="icon-calendar"></i><strong> Birthday: </strong> {{ Auth::user()->profile->date }}</h5>
                        <h5 class="card-text"><i class="icon-heart"></i><strong> Bio: </strong> {{ Auth::user()->profile->about_me }}</h5>
                        <h5 class="card-text"><i class="icon-screen-smartphone"></i><strong> Cellprone: </strong> {{ Auth::user()->profile->cellphone }}</h5>
                        <h5 class="card-text"><i class="icon-chemistry"></i><strong> Career: </strong> {{ Auth::user()->profile->career->name }}</h5>
                        <h5 class="card-text"><i class="icon-people"></i><strong> Gender: </strong> {{ Auth::user()->profile->G }}</h5>
                        <hr>
                        <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('profile.edit', Auth::user()->profile->user_id) }}" class="btn btn-success btn-block">Edit profile</a>
                                </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Please complete the profile</h4>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('profile.create') }}" class="btn btn-primary btn-block">Complete profile</a>
                            </div>
                        </div>
                    @endif
                    
                </div>

                

            </div>
    </div>
</div>

    
@endsection