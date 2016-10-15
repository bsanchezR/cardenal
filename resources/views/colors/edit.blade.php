
@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Color</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($color, ['route' => ['colors.update', $color->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}
                              <div class="form-group">
                                {!! Form::label('modelo_id', 'Modelo :', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-6">
                                <select class="form-control" name="modelo_id">
                                  @foreach($modelos as $modelo)
                                    <option value="{{$modelo->id}}">{{$modelo->nombre}}</option>
                                  @endforeach
                                </select>
                                </div>
                              </div>
                                  @include('colors.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
