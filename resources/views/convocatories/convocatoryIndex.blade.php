@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($convocatories))
            <div class="row justify-content-center m-3">
                <div class="col-9 text-center">
                    <h3>Convocatories</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convocatories as $convocatory)
                                    <tr>
                                        <td> {{ $convocatory->id }} </td>
                                        <td> {{ $convocatory->start }} </td>
                                        <td> {{ $convocatory->end }} </td>
                                        <td> <a  class="btn btn-success" href="{{ route('convocatory.show', $convocatory->id) }}"><i class="icon-eye"></i></a></td>
                                    </tr>
                                @endforeach
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


