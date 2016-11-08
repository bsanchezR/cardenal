
@extends('vistas.panel')

@section('content')
        <h1 class="pull-left">cupons</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cupons.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cupons.table')

@endsection
