@if (isset($divisions))
    <div class="m-3 row justify-content-center">
        <h2 class="text-center">Divisions</h2>
        @foreach ($divisions as $division)
            @if($division->status && count($division->modules) > 0)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('divisions.modules', $division->id) }}">{{ $division->description }}</a></h5>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    <div>
@else
    <h3 class="text-center"> There are no data!</h3>
@endif


