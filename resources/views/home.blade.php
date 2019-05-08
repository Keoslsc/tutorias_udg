@extends('layouts.app')

@section('content')
    @if ($user->status == 1)

        @if (!isset($user->profile))
            @include('profiles.completeProfile')
        @endif 

        @if($user->hasRole('admin'))
        @else
            @include('divisions.divisionIndexHome', $divisions)
        @endif

    @else
        @include('layouts.nouser')
    @endif
    

@endsection
