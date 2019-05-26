@extends('layouts.app')

@section('content')
    @if (Auth::user()->status == 1)

        @if (!isset(Auth::user()->profile))
            @include('profiles.completeProfile')
        @endif 
        @if(Auth::user()->hasRole('admin'))
        @else
            @include('divisions.divisionIndexHome', $divisions)
        @endif

    @else
        @include('layouts.nouser')
    @endif
    

@endsection
