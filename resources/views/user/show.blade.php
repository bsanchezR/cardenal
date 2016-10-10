@extends('layouts.app')

@section('content')
    @include('user.show_fields')

    <div class="form-group">
           <a href="{!! route('user.index') !!}" class="btn btn-default">Volver</a>
    </div>
@endsection
