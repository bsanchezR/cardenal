@extends('vistas.panel')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New almacen</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'almacens.store']) !!}

            @include('almacens.fields')

        {!! Form::close() !!}
    </div>
@endsection
