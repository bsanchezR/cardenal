@extends('vistas.panel')

@section('content')
    @include('citas.show_fields')

    <div class="form-group">
           <a href="{!! route('citas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
