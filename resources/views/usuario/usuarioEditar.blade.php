@extends('vistas.panel')

@section('content')


  @include('core-templates::common.errors')

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Cambiar Usuario</h3>
                            <div class="example-box-wrapper">
                              {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch','class' => 'form-horizontal bordered-row']) !!}
                                  @include('user.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
@endsection
