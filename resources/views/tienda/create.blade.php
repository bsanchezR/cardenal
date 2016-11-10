

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Nueva Tienda</h3>
                            <div class="example-box-wrapper">
                              {!! Form::open(['route' => 'tienda.store','class' => 'form-horizontal bordered-row']) !!}
                                  @include('tienda.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
