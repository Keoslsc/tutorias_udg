@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
            <div class="jumbotron">
                <h1 class="display-4">Hello, please complete the profile!</h1>
                <p class="lead">It is important that you complete your profile so that we can give you a better experience.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('profile.create') }}" role="button">Go!</a>
            </div>
    </div>
@endsection
