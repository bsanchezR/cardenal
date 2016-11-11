

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Agregar Persianas</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($pedido, ['route' => ['agregar.pedidos', $pedido->id],'class' => 'form-horizontal bordered-row','id' => 'forms_p']) !!}

                                  @include('pedidos.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
