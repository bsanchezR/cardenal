@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit almacen</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($almacen, ['route' => ['almacens.update', $almacen->id], 'method' => 'patch']) !!}

            @include('almacens.fields')

            {!! Form::close() !!}
        </div>
@endsection
