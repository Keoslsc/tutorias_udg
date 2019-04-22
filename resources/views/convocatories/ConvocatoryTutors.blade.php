@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($tutors) > 0)
            <div class="row justify-content-center">
                <div class="col-9 text-center">
                    <h3>Tutor's request </h3>
                    @if ($errors->has('fash'))
                        <div class="alert alert-warning">
                            <strong>{{ $errors->first('flag') }}</strong>
                        </div>
                    @endif
                    @if(session()->has('Approved'))
                        <div class="form-group">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('Approved') }}
                            </div>
                        </div>
                    @endif
                    @if(session()->has('Decline'))
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                {{ session()->get('Decline') }}
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id user</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Application date</th>
                                    <th>Status</th>
                                    <th>Authorize</th>
                                    <th>Decline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutors as $tutor)
                                    <tr>
                                        <td> {{ $tutor->id }} </td>
                                        <td> {{ $tutor->name }} </td>
                                        <td> {{ $tutor->email }} </td>
                                        <td> {{ $tutor->pivot->created_at }} </td>
                                        @if( $tutor->status === 1)
                                            <td><span class="badge badge-success">APROVED</span></td>
                                            <td>Not available</td>
                                            <td>Not available</td>
                                        @elseif($tutor->status  === 2)
                                            <td><span class="badge badge-primary">PENDING</span></td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#modalApproved" class="btn btn-success">
                                                    <i class="icon-check"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalApproved" tabindex="-1" role="dialog" aria-labelledby="modalApprovedLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                I will not be able to make changes.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href=""></a>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('approved-form{{ $tutor->id }}').submit();" class="btn btn-primary">Accept</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form id="approved-form{{ $tutor->id }}" action="{{ route('convocatory.tutors', $tutor->pivot->convocatory_id) }}" method="POST" style="display: none;">
                                                    <input type="hidden" name="flag" value="1">
                                                    <input type="hidden" name="id" value="{{ $tutor->id }}">
                                                    @csrf
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#modalDecline" class="btn btn-danger">
                                                    <i class="icon-close"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalDecline" tabindex="-1" role="dialog" aria-labelledby="modalDeclineLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                I will not be able to make changes.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href=""></a>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('decline-form{{ $tutor->id }}').submit();" class="btn btn-primary">Accept</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form id="decline-form{{ $tutor->id }}" action="{{ route('convocatory.tutors', $tutor->pivot->convocatory_id) }}" method="POST" style="display: none;">
                                                    <input type="hidden" name="flag" value="3">
                                                    <input type="hidden" name="id" value="{{ $tutor->id }}">
                                                    @csrf
                                                </form>
                                            </td>
                                        @elseif($tutor->status  === 3)
                                            <td><span class="badge badge-danger">DECLINED</span></td>
                                            <td>Not available</td>
                                            <td>Not available</td>
                                        @endif
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


