
@extends('vistas.panel')

@section('content')

<script type="text/javascript">

  $(document).ready(function(){

    var bandera =  false;

    $("#por").show();
    $("#des").hide();

    $("#tipo_descuento" ).change(function() {

      if(this.value == 2 && bandera == false){
        $("#por").hide();
        $("#des").show();
        bandera = true;
        console.log('entro');
      }
      else if(this.value == 1 && bandera == true){
        $("#por").show();
        $("#des").hide();
        bandera = false;
        console.log('entro2');
      }

    });
  });
</script>




    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Nuevo cupón</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'cupons.store']) !!}

            @include('cupons.fields')

        {!! Form::close() !!}
    </div>
@endsection
