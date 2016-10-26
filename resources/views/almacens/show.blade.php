@extends('layouts.app')

@section('content')
    @include('almacens.show_fields')

    <div class="form-group">
           <a href="{!! route('almacens.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
