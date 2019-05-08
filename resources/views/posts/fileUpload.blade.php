    
{!! Form::open(['route' => 'file.store', 'files' => true, 'id' => 'form-file-upload']) !!}
<div class="form-group"> 
    <label for="files" class="col-form-label">Select files to upload:</label>
    {!! Form::file('files[]', ['multiple' => true], ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Upload', ['class' => 'btn btn-success']) !!}

@if (isset($modelo_id) && isset($modelo_type))
    {!! Form::hidden('modelo_id', $modelo_id) !!}
    {!! Form::hidden('modelo_type', $modelo_type) !!}
@endif

{!! Form::close() !!}