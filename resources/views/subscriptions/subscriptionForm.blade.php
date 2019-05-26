@if($user->hasRole('student'))
    @foreach ($division->modules as $module)
        @if($module->status)
            <div class="card" style="max-width: 18rem; min-height: 10rem">
                <div class="card-body justify-content-center pt-3 text-white" style="background-image: url({{asset('assets/images/utility/placaStudent.png')}});">
                    <div class="card-header">
                        <h5 class="card-title text-white font-weight-bold text-center">{{ $module->name }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    @if ( count($user->modules->where('id', $module->id)) > 0 ) 
                    <form action="{{ route('subscription.module.destroy') }}" method="POST" class="row">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Unsubscribe</button></div>
                        <div class="col-6"><a href=" {{ route('module.show', $module->id) }} " class="btn btn-success btn-block" role="button">Explore</a></div>
                    @else
                    <form action="{{ route('subscription.module.store') }}" method="POST" class="row">
                        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Subscription</button></div>
                        <div class="col-6"><a href="{{ route('module.show', $module->id) }}" class="btn btn-secondary btn-block" role="button">View</a></div>

                    @endif
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                    </form>
                </div>  
            </div>
        @endif
    @endforeach
@else            
    @foreach ($division->modules as $module)
        @if($module->status)
            <div class="card" style="max-width: 18rem; min-height: 10rem;">
                <div class="card-body justify-content-center pt-3 text-white" style="background-image: url({{asset('assets/images/utility/pl.png')}});">
                    <div class="card-header">
                        <h5 class="card-title text-white font-weight-bold text-center">{{ $module->name }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    @if ( count($user->modules->where('id', $module->id)) > 0 ) 
                    <form action="{{ route('subscription.module.destroy') }}" method="POST" class="row">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Unsubscribe</button></div>
                        <div class="col-6"><a href=" {{ route('module.show', $module->id) }} " class="btn btn-success btn-block" role="button">Explore</a></div>
                    @else
                    <form action="{{ route('subscription.module.store') }}" method="POST" class="row">
                        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Join clas</button></div>
                        <div class="col-6"><a href="{{ route('module.show', $module->id) }}" class="btn btn-secondary btn-block" role="button">View</a></div>
                    @endif
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                    </form>
                    <p class="card-text pt-3"><small class="text-muted">Users: {{ $module->users->count() }}</small></p>
                </div>  
            </div>
        @endif
    @endforeach

@endif

