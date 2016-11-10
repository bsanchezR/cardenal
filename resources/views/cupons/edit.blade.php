
@extends('vistas.panel')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit cupon</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($cupon, ['route' => ['cupons.update', $cupon->id], 'method' => 'patch']) !!}

            @include('cupons.fields')

            {!! Form::close() !!}
        </div>
@endsection
