@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Usuarios</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('user.create') !!}">Agregar</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('user.table')

@endsection
