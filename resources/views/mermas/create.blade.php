@extends('vistas.panel')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nuevo articulo</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'mermas.store']) !!}

            @include('mermas.fields')

        {!! Form::close() !!}
    </div>
@endsection
