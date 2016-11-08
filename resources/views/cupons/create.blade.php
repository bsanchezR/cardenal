
@extends('vistas.panel')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New cupon</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'cupons.store']) !!}

            @include('cupons.fields')

        {!! Form::close() !!}
    </div>
@endsection
