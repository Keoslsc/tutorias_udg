@extends('layouts.app')
@section('content')
<div class="row justify-content-center m-3">
    <div class="col-md-6">
            <div class="card">
                
                <div class="row justify-content-center  py-2">

                    <div class="col-3"></div>
                    <div class="col-6 text-center">
                        <img class="img-avatar" src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" >
                    </div>
                    <div class="col-3"></div>
                    
                </div>

                <div class="text-center">
                    <h2 class="card-title">{{ $user->name }}</h2>
                </div>

                <hr>
                <div class="card-body">
                    <h4>Information: </h4>
                    <h5 class="card-text"><i class="icon-envelope-open"></i> {{ $user->email }} </h5>
                    <h5 class="card-text"><i class="icon-badge"></i> {{ $user->roles->first()->description }} </h5>
                    @if($user->roles->first()->description === 'Tutor')                                   
                    <h5 class="card-text"><i class="icon-star"></i>    Rating: 
                                    @for ($i = 0; $i < round( $user->aveg() ,0); $i++)
                                    <i class="fa fa-star fa-lg" style="color:#d8ca5d"></i>
                                    @endfor
                                    @for ($i = round($user->aveg(),0); $i < 5 ;$i++)
                                    <i class="fa fa-star fa-lg" style="color:#afac95"></i>
                                    @endfor
                                    {{number_format($user->aveg(), 1, '.', '')}}
                    </h5> 
                    @endif
                    <hr>                   
                    @if(isset($user->profile))
                        <h4>About me: </h4>
                        <h5 class="card-text"><i class="icon-calendar"></i><strong> Birthday: </strong> {{ $user->profile->date }}</h5>
                        <h5 class="card-text"><i class="icon-heart"></i><strong> Bio: </strong> {{ $user->profile->about_me }}</h5>
                        <h5 class="card-text"><i class="icon-screen-smartphone"></i><strong> Cellphone: </strong> {{ $user->profile->cellphone }}</h5>
                        <h5 class="card-text"><i class="icon-chemistry"></i><strong> Career: </strong> {{ $user->profile->career->name }}</h5>
                        <h5 class="card-text"><i class="icon-people"></i><strong> Gender: </strong> {{ $user->profile->G }}</h5>
                        <hr>
                        <div class="row">
                                <div class="col-4">
                                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-block">Back</a>
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-4">
<<<<<<< HEAD
                                    <a href="mailto:{{ $profile->user->email }}" class="btn btn-primary btn-block">Contact <i class="icon-action-redo"></i></a>
=======
                                    <a href="mailto:{{ $user->email }}" class="btn btn-success btn-block">Contact <i class="icon-action-redo"></i></a>
>>>>>>> 07c96737dda7f4748ca3a1399879870ef031b5a9
                                </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <h4>No data</h4>
                            </div>
                            <div class="col-4">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-block">Back</a>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <a href="mailto:{{ $user->email }}" class="btn btn-success btn-block">Contact <i class="icon-action-redo"></i></a>
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
    </div>
</div>

    
@endsection