@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Nuevo Cliente</h3>
                            <div class="example-box-wrapper">
                              {!! Form::open(['route' => 'cliente.store','class' => 'form-horizontal bordered-row']) !!}
                                  @include('cliente.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
