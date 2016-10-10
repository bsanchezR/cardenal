@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Ver Usuario</h3>
                            <div class="example-box-wrapper">
                              {!! Form::open(['' => '','class' => 'form-horizontal bordered-row']) !!}
                                  @include('user.show_fields')
                              {!! Form::close() !!}
                              <div class="form-group col-sm-9" style="text-align:center;">
                                     <a href="{!! route('user.index') !!}" class="btn btn-lg btn-default">Volver</a>
                              </div>
                            </div>
                        </div>
                    </div>
@endsection
