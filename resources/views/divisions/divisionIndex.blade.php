@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($divisions))
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                                <tr>
                                    <td>{{ $division->id }}</td>
                                    <td>{{ $division->created_at }}</td>
                                    <td>{{ $division->description }}</td>
                                    @if( $division->status === 1)
                                        <td><span class="badge badge-success">ACTIVE</span></td>
                                    @else
                                        <td><span class="badge badge-danger">INACTIVE</span></td>
                                    @endif
                                    <td><a class="btn btn-primary btn-block" href="{{ route('division.edit', $division->id) }}"><i class="icon-pencil"></i></a></td>
                                    <td>
                                        <form action="{{ route('division.destroy', $division->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-block"><i class="icon-trash"></i></button>
                                        </form>
                                    </td>
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


