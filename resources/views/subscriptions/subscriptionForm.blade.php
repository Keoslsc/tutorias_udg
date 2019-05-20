@if($user->hasRole('student'))
    @foreach ($division->modules as $module)
        @if($module->status)
            <div class="card" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $module->name }}</h5>
                    @if ( count($user->modules->where('id', $module->id)) > 0 ) 
                    <form action="{{ route('subscription.module.destroy') }}" method="POST" class="row">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Unsubscribe</button></div>
                        <div class="col-6"><a href=" {{ route('module.show', $module->id) }} " class="btn btn-success btn-block" role="button">Explore</a></div>
                    @else
                    <form action="{{ route('subscription.module.store') }}" method="POST" class="row">
                        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Subscription</button></div>
                        <div class="col-6"><a href="#" class="btn btn-secondary btn-block" role="button">View</a></div>

                    @endif
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                    </form>
                    <p class="card-text"><small class="text-muted">Last tutors: 0</small></p>
                </div>  
            </div>
        @endif
    @endforeach
@else            
    @foreach ($division->modules as $module)
        @if($module->status)
            <div class="card" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $module->name }}</h5>
                    @if ( count($user->modules->where('id', $module->id)) > 0 ) 
                    <form action="{{ route('subscription.module.destroy') }}" method="POST" class="row">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Unsubscribe</button></div>
                        <div class="col-6"><a href=" {{ route('module.show', $module->id) }} " class="btn btn-success btn-block" role="button">Explore</a></div>
                    @else
                    <form action="{{ route('subscription.module.store') }}" method="POST" class="row">
                        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Join class</button></div>
                        <div class="col-6"><a href="#" class="btn btn-secondary btn-block" role="button">View</a></div>
                    @endif
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                    </form>
                    <p class="card-text"><small class="text-muted">Last tutors: 0</small></p>
                </div>  
            </div>
        @endif
    @endforeach

@endif

