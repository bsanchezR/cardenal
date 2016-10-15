

@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Nuevo Pedido</h3>
                            <div class="example-box-wrapper">
                              {!! Form::open(['route' => 'pedidos.store','class' => 'form-horizontal bordered-row']) !!}

                                  @include('pedidos.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
