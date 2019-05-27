@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($comments))
            <div class="m-3 row justify-content-center">
                <h3 class="text-center">Comments</h3>
                @include('messages.messages')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Body</th>
                                <th>Module</th>
                                <th>Soft Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->post->module->name }}</td>
                                    <td> 
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-block"><i class="icon-trash"></i></button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {!! $comments->render() !!}
                </div>
            </div>
        @else
            <h3 class="text-center"> There are no data!</h3>
        @endif
    </div>
@endsection
