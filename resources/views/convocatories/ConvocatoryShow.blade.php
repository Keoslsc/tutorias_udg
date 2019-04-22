@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($convocatory) > 0)
            <div class="row justify-content-center">
                <div class="col-9 text-center">
                    <h3>Convocatory details</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Text</th>
                                    <th>Tutors</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td> {{ $convocatory->id }} </td>
                                        <td> {{ $convocatory->start }} </td>
                                        <td> {{ $convocatory->end }} </td>
                                        <td> {{ $convocatory->written }} </td>
                                        <td> <a  class="btn btn-info" href="{{ route('convocatory.tutors', $convocatory->id) }}"><i class="icon-people"></i></a></td>
                                        <td> <a  class="btn btn-warning" href="#"><i class="icon-pencil"></i></a> </td>
                                        <td> <a  class="btn btn-danger" href="#"><i class="icon-trash"></i></a> </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <h3 class="text-center"> There are no data!</h3>
        @endif
    </div>
@endsection


