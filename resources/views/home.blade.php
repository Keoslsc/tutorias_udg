@extends('layouts.app')

@section('content')
    @if (Auth::user()->status == 1)
        @if(Auth::user()->hasRole('admin'))
         
        @elseif(Auth::user()->hasRole('tutor'))
            <div class="text-center"><h3>Tutor</h3></div>
            @if (!isset($profile))
                @include('profiles.completeProfile')
            @endif

        @else
            <div class="text-center"><h3>Student</h3></div>
            @if (!isset($profile))
                @include('profiles.completeProfile')
            @endif
        @endif
    @else
        @include('layouts.nouser')
    @endif
    

@endsection
