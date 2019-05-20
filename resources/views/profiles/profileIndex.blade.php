@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center m-3">
    <div class="col-md-6">
            <div class="card card-profile">
                <div class="card-header" style="background-image: url({{asset('assets/images/utility/cover_header.png')}});"></div>
                <div class="card-body justify-content-center py-2">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 text-center">
                            <img class="img-avatar card-profile-img" src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" >
                        </div>
                        <div class="col-3"></div>
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
                        <h5 class="card-text"><i class="icon-screen-smartphone"></i><strong> Cellphone: </strong> {{ Auth::user()->profile->cellphone }}</h5>
                        <h5 class="card-text"><i class="icon-chemistry"></i><strong> Career: </strong> {{ Auth::user()->profile->career->name }}</h5>
                        <h5 class="card-text"><i class="icon-people"></i><strong> Gender: </strong> {{ Auth::user()->profile->G }}</h5>
                        <hr>
                        <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('profile.edit', Auth::user()->profile->user_id) }}" class="btn btn-primary btn-block">Edit profile</a>
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
</div>

    
@endsection