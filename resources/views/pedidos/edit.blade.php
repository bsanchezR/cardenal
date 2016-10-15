

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Pedido</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($pedido, ['route' => ['pedidos.update', $pedido->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}

                                  @include('pedidos.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
