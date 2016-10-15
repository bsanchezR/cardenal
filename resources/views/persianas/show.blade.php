@extends('layouts.app')

@section('content')
    @include('persianas.show_fields')

    <div class="form-group">
           <a href="{!! route('persianas.index') !!}" class="btn btn-default">Volver</a>
    </div>
@endsection
