@extends('layouts.app')

@section('content')
    <div class="m-3">
        @if (isset($division->modules))
        <div class="row">
            <div class="col-8 col-sm-8 col-md-9 col-lg-11 col-xl-11"></div>
            <div class="col-4 col-sm-4 col-md-3 col-lg-1 col-xl-1">
                <a href=" {{ route('home') }} " class="btn btn-danger btn-block"> Go Back</a>
            </div>
        </div>
        <h2 class="text-center text-truncate">Modules  of {{ $division->description }}</h2>
            <div class="row justify-content-center pt-2">
                <div class="col-11">
                    @include('messages.messages')
                    <div class="card-columns">
                        @include('subscriptions.subscriptionForm')
                    </div>
                </div>
            </div>
        @else
            <h3 class="text-center"> There are no data!</h3>
        @endif
        </div>  
    </div>
@endsection