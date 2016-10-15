@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar persiana</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($persiana, ['route' => ['persianas.update', $persiana->id], 'method' => 'patch']) !!}

            @include('persianas.fields')

            {!! Form::close() !!}
        </div>
@endsection
