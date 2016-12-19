

@extends('vistas.panel')

@section('content')
        <div id="page-title">
            <h2>Instalaciones</h2>
            <p>Panel de informacion</p>
        </div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <script type="text/javascript" src="{{ asset('widgets/datepicker/datepicker.js')}}"></script>
          <script type="text/javascript">
              /* Datepicker bootstrap */
              $(function() {
                  "use strict";
                  $('.bootstrap-datepicker').bsdatepicker({
                      format: 'yyyy-mm-dd'
                  });
              });
          </script>

                  <div class="panel">
                      <div class="panel-body">
                          <h3 class="title-hero">Listado de Instalaciones</h3>
                          <div id="filtros" class="row">
                            {!! Form::model(null, ['route' => ['admin.update', Auth::user()->id], 'method' => 'patch','id' => 'forms_p']) !!}
                              <div class="form-group col-sm-3">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" class="form-control">
                                  <option value="-1">Todo</option>
                                  <option value="1">Liquidado</option>
                                  <option value="0">Faltante</option>
                                </select>
                              </div>
                              <div class="form-group col-sm-3">
                                <label for="vendedor">Vendedor</label>
                                <select id="vendedor" name="vendedor" class="form-control">
                                  <option value="0">Todos</option>
                                  @foreach($vendedores as $vendedor)
                                    <option value="{!! $vendedor->id !!}"> {!! $vendedor->name !!}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-sm-3">
                                <label for="fecha_inicio">Fecha inicio</label>
                                {!! Form::text('fecha_inicio', null, ['class' => 'form-control bootstrap-datepicker','id'=>'fecha_inicio']) !!}
                              </div>
                              <div class="form-group col-sm-3">
                                <label for="fecha_fin">Fecha fin</label>
                                {!! Form::text('fecha_fin', null, ['class' => 'form-control bootstrap-datepicker','id'=>'fecha_fin']) !!}
                              </div>
                              <div class="form-group col-sm-6">
                                <a id="enviar" class="btn btn-primary">Enviar</a>
                              </div>
                              {!! Form::close() !!}
                          </div>
                          <div class="divider"></div>
                          <div class="example-box-wrapper">
                            <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
                            @include('admin.table')
                          </table>
                          </div>
                      </div>
                  </div>

<script>
  $('#enviar').click(function()
  {
    var form = document.getElementById('forms_p');

    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var f=$('#fecha_inicio').val();
    if(f != '' && f.match(regEx))
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_inicial");
      hiddenField.setAttribute("value", f);
      form.appendChild(hiddenField);
    }
    else
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_inicial");
      hiddenField.setAttribute("value", null);
      form.appendChild(hiddenField);
    }

    var g=$('#fecha_fin').val();
    if(g != '' && g.match(regEx))
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_final");
      hiddenField.setAttribute("value", g);
      form.appendChild(hiddenField);
    }
    else
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_final");
      hiddenField.setAttribute("value", null);
      form.appendChild(hiddenField);
    }


    form.submit();
  });
</script>
@endsection
