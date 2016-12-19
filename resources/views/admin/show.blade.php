
@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                          <h4 class="invoice-title float-right">Folio : # {!! $pedido->folio !!}</h4>
                            <h3 class="title-hero">Detalles del Pedido<br><br></h3>
                            <div class="example-box-wrapper" style="text-align:center;">
                              @include('admin.show_fields')                 <div class="divider"></div>
                              <br><br>
                              <div class="form-group col-sm-12" style="text-align:center;">
                                     <a href="{!! route('admin.index') !!}" class="btn btn-lg btn-default">Volver</a>
                              </div>
                            </div>
                        </div>
                    </div>
@endsection
