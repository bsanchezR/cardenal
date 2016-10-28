@extends('vistas.panel')

@section('content')


<div class="center-vertical bg-black">
    <div class="center-content">
        <form action="{{ url('/login') }}" id="login-validation" class="col-md-5 col-sm-5 col-xs-11 center-margin" role="form" method="POST">
            {!! csrf_field() !!}
            <h3 class="text-center pad25B font-gray font-size-23">Ramave <span class="opacity-80">v0.1</span></h3>
            <div id="login-form" class="content-box">
                <div class="content-box-wrapper pad20A">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Correo:</label>
                        <div class="input-group input-group-lg"><span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-envelope-o"></i></span>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="exampleInputPassword1">Password:</label>
                        <div class="input-group input-group-lg"><span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-unlock-alt"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="button-pane">
                    <button type="submit" class="btn btn-block btn-primary">Iniciar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{ asset('widgets/dropdown/dropdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/tooltip/tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/popover/popover.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/progressbar/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/button/button.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/collapse/collapse.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/superclick/superclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/input-switch/inputswitch-alt.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/slimscroll/slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/slidebars/slidebars.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/slidebars/slidebars-demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/charts/piegage/piegage.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/charts/piegage/piegage-demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/screenfull/screenfull.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/content-box/contentbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/material/material.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/material/ripples.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/overlay/overlay.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/admin/layout.js') }}"></script>
@endsection
