
@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Detalles de instalacion</h3>
                            <div class="example-box-wrapper" style="text-align:center;">
                                  @include('instalacion.show_fields')
                              <div class="form-group col-sm-12" style="text-align:center;">
                                     <a href="{!! route('instalacion.index') !!}" class="btn btn-lg btn-default">Volver</a>
                              </div>
                            </div>
                        </div>
                    </div>
@endsection
