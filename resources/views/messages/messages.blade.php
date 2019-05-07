@if(session()->has('success'))
    <div class="col-md-12 py-4 text-center">
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }} <i class="icon-check"></i>
        </div>
    </div>
@endif

@if(session()->has('registered'))
    <div class="col-md-12 py-4 text-center">
        <div class="alert alert-success" role="alert">
            {{ session()->get('registered') }} <i class="icon-check"></i>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="col-md-12 py-4 text-center">
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }} <i class="icon-close"></i>
        </div>
    </div>
@endif

@if(session()->has('alert'))
    <div class="col-md-12 py-4 text-center">
        <div class="alert alert-info" role="alert">
            {{ session()->get('alert') }} <i class="icon-info"></i>
        </div>
    </div>
@endif