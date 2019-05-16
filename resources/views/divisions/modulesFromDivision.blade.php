@extends('layouts.app')

@section('content')
    <div class="m-3">

        @if (count($division->modules) > 0)
            <h2 class="text-center">Modules  of {{ $division->description }}</h2>
            <div class="row justify-content-center">
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