
@if ( count(Auth::user()->modules->where('id', $module->id)) > 0 ) 
    <form action="{{ route('subscription.module.destroy') }}" method="POST" class="row">
    <input type="hidden" name="_method" value="DELETE">
    <div class="col-6"><button class="btn btn-danger btn-block" type="submit">Unsubscribe</button></div>
    <div class="col-6"><a href="#" class="btn btn-success btn-block" role="button">Explore</a></div>
@else
    <form action="{{ route('subscription.module.store') }}" method="POST" class="row">
    @if(Auth::user()->hasRole('student'))
        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Subscription</button></div>
        <div class="col-6"><a href="#" class="btn btn-secondary btn-block" role="button">View</a></div>
    @else
        <div class="col-6"><button class="btn btn-primary btn-block" type="submit">Tutoring</button></div>
        <div class="col-6"><a href="#" class="btn btn-secondary btn-block" role="button">View</a></div>
    @endif
@endif
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="module_id" value="{{ $module->id }}">
    
</form>