

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Tienda</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($tienda, ['route' => ['tienda.update', $tienda->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}
                                  @include('tienda.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
