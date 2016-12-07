
@extends('vistas.panel')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nueva cita</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'citas.store','id' => 'forms_p']) !!}

            @include('citas.fields')

        {!! Form::close() !!}
    </div>
@endsection
