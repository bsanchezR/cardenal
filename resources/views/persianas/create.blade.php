@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nueva persiana</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'persianas.store']) !!}

            @include('persianas.fields')

        {!! Form::close() !!}
    </div>
@endsection
