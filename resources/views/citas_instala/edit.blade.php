@extends('vistas.panel')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit cita</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cita, ['route' => ['citas_instala.update', $cita->id], 'method' => 'patch']) !!}

            @include('citas_instala.fields')

            {!! Form::close() !!}
        </div>
@endsection
