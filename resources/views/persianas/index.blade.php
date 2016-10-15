@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Persianas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('persianas.create') !!}">Agregar</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>


        <div class="table-responsive">
        @include('persianas.table')
        </div>

@endsection
