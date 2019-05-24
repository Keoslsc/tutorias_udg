@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($convocatories) > 0)
            <div class="row justify-content-center m-3">
                <div class="col-9 text-center">
                    @include('messages.messages')
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

                        {!! $convocatories->render() !!}
                    </div>
                </div>
            </div>
        @else
            <h3 class="text-center pt-5"> There are no data!</h3>
        @endif
    </div>
@endsection


