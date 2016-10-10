@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Cliente</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}
                                  @include('cliente.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
