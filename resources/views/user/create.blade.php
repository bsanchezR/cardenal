@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nuevo usuario</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'user.store']) !!}
            @include('user.fields')

        {!! Form::close() !!}
    </div>
@endsection
