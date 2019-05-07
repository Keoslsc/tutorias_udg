@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($posts))
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Created</th>
                                <th>User_Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->user_id}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        @else
            <h3 class="text-center"> There are no data!</h3>
        @endif
    </div>
@endsection
