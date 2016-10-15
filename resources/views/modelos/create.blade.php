
@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Nueva Marca</h3>
                            <div class="example-box-wrapper">
                              {!! Form::open(['route' => 'modelos.store','class' => 'form-horizontal bordered-row']) !!}
                              <div class="form-group">
                                {!! Form::label('marca_id', 'Marca :', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-6">
                                <select class="form-control" name="marca_id">
                                  @foreach($marca as $marc)
                                    <option value="{{$marc->id}}">{{$marc->nombre}}</option>
                                  @endforeach
                                </select>
                                </div>
                              </div>
                                  @include('modelos.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
