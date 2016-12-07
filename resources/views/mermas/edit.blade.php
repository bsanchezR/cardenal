@extends('vistas.panel')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar articulo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($merma, ['route' => ['mermas.update', $merma->id], 'method' => 'patch']) !!}

            @include('mermas.fields')

            {!! Form::close() !!}
        </div>
@endsection
