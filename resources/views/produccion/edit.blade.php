

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Compra</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($pedido, ['route' => ['compras.update', $pedido->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}

                                  @include('compras.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
