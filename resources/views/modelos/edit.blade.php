
@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Modelo</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($modelo, ['route' => ['modelos.update', $modelo->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}

                              <div class="form-group">
                                {!! Form::label('marca_id', 'Marca :', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-6">
                                <select class="form-control" name="marca_id">
                                  @foreach($marca as $marc)
                                    @if ($marc->id === $modelo->marca_id)
                                      <option value="{{$marc->id}}" selected="selected">{{$marc->nombre}}</option>
                                    @else
                                      <option value="{{$marc->id}}">{{$marc->nombre}}</option>
                                    @endif
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
