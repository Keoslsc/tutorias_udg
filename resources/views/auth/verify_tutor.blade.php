@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your account has not yet been authorize.') }}</div>

                <div class="card-body">
                   {{ __('When your account is authorized you will receive an E-Mail.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
