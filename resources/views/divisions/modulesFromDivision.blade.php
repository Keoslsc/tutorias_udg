@extends('layouts.app')

@section('content')
    @if (count($modules) > 0)
        <h2 class="text-center">Modules  of {{ $modules[0]->division->description }}</h2>
        <div class="row justify-content-center">
            <div class="col-11">
                @include('messages.messages')
                <div class="card-columns">
                    @foreach ($modules as $module)
                        @if($module->status)
                            <div class="card" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $module->name }}</h5>
                                    @include('subscriptions.subscriptionForm', $module)
                                    <p class="card-text"><small class="text-muted">Last tutors: 0</small></p>
                                </div>  
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
    <h3 class="text-center"> There are no data!</h3>
    @endif
    </div>
        
@endsection