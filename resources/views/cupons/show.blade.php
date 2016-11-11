
@extends('vistas.panel')

@section('content')
    @include('cupons.show_fields')

    <div class="form-group">
           <a href="{!! route('cupons.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
