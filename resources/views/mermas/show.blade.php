@extends('vistas.panel')

@section('content')
    @include('mermas.show_fields')

    <div class="form-group">
           <a href="{!! route('mermas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
