@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar usuario</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']) !!}
            @include('user.fields')

            {!! Form::close() !!}
        </div>
@endsection
