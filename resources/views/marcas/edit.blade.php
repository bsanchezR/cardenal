

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Marca</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($marca, ['route' => ['marcas.update', $marca->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}
                                  @include('marcas.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
