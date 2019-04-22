@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($modules))
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $module->id }}</td>
                                    <td>{{ $module->created_at }}</td>
                                    <td>{{ $module->name }}</td>
                                    @if( $module->status === 1)
                                        <td><span class="badge badge-success">ACTIVE</span></td>
                                    @else
                                        <td><span class="badge badge-danger">INACTIVE</span></td>
                                    @endif
                                    <td><a class="btn btn-primary btn-block" href="{{ route('module.edit', $module->id) }}"><i class="icon-pencil"></i></a></td>
                                    <td>
                                        <form action="{{ route('module.destroy', $module->id) }}" method="POST">
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


