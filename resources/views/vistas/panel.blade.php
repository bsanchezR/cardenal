<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #loading .svg-icon-loader {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -50px 0 0 -50px;
        }
        .tooltip-inner
        {
          width: 200px !important;
        }

        #loader
        {
          display: block;
          background: rgba(255, 255, 255, 0.8);
          color: white;
          width: 100%;
          height: 100%;
          position: fixed;
          top: 0;
          left: 0;
          z-index: 1000000;
        }
        #loader p
        {
          display: block;
          width: 100px;
          height: 30px;
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          font-size: 30px;
          margin: auto;
        }
    </style>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/icons/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/icons/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/icons/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/icons/apple-touch-icon-57-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/icons/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/boilerplate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/border-radius.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/page-transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/spacing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/typography.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/utils.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('material/ripple.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/badges.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/buttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/content-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/dashboard-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/images.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/info-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/invoice.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/loading-indicators.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/menus.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/panel-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/response-messages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/responsive-tables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/ribbon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/social-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/tables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/tile-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elements/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/fontawesome/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/linecons/linecons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/spinnericon/spinnericon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/accordion-ui/accordion.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/calendar/calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/carousel/carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/charts/justgage/justgage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/charts/morris/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/charts/piegage/piegage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/charts/xcharts/xcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/chosen/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/colorpicker/colorpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/datatable/datatable.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/datepicker/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/datepicker-ui/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/dialog/dialog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/dropdown/dropdown.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/dropzone/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/file-input/fileinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/input-switch/inputswitch.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/input-switch/inputswitch-alt.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/ionrangeslider/ionrangeslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/jcrop/jcrop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/jgrowl-notifications/jgrowl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/loading-bar/loadingbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/maps/vector-maps/vectormaps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/markdown/markdown.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/modal/modal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/multi-select/multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/multi-upload/fileupload.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/nestable/nestable.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/noty-notifications/noty.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/popover/popover.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/pretty-photo/prettyphoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/progressbar/progressbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/range-slider/rangeslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/slidebars/slidebars.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/slider-ui/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/summernote-wysiwyg/summernote-wysiwyg.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/tabs-ui/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/timepicker/timepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/tocify/tocify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/tooltip/tooltip.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/touchspin/touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/uniform/uniform.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/wizard/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('widgets/xeditable/xeditable.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/chat.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/files-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/login-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/notification-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/progress-box.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/todo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/user-profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('snippets/mobile-navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('applications/mailbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/admin/layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/admin/color-schemes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/components/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/components/border-radius.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/responsive-elements.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('helpers/admin-responsive.css') }}">
    <script type="text/javascript" src="{{ asset('js-core/jquery-core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/jquery-ui-core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/jquery-ui-widget.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/jquery-ui-mouse.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/jquery-ui-position.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/transition.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-core/jquery-cookie.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            setTimeout(function() {
                $('#loading').fadeOut(400, "linear");
            }, 300);
        });
    </script>

</head>

<body>
    <div id="sb-site">
        <div id="loading">
            <div class="svg-icon-loader"><img src="{{ asset('images/svg-loaders/bars.svg') }}" width="40" alt=""></div>
        </div>
        <div id="page-wrapper">
            <div id="mobile-navigation">
                <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
            </div>
            <div id="page-sidebar">
                <!-- <div id="header-logo" class="logo-bg"> -->
                  <div id="header-logo" class="logo-bg">
                  <a href="index.html" class="logo-content-big" title="DelightUI">Ramave <i>Persianas</i> <span>Dando sombra a tu vida.</span></a> <a href="index.html" class="logo-content-small" title="Ramave">Ramave <i>Persianas</i> <span>Dando sombra a tu vida</span></a> <a id="close-sidebar"  title="Close sidebar"><i class="glyph-icon icon-outdent"></i></a></div>
                <div class="scroll-sidebar">
                    <ul id="sidebar-menu">
                        <li class="header"><span>Administrador</span></li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Pedidos</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('pedidos.index') !!}" title="Buttons"><span>Listado de Pedidos</span></a></li>
                                    <li><a href="{!! route('pedidos.create') !!}" title="Labels &amp; Badges"><span>Nuevo Pedido</span></a></li>

                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Usuarios</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('user.index') !!}" title="Labels &amp; Badges"><span>Listado de Usuarios</span></a></li>
                                    <li><a href="{!! route('user.create') !!}" title="Buttons"><span>Nuevo Usuario</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Clientes</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('cliente.index') !!}" title="Labels &amp; Badges"><span>Listado de Clientes</span></a></li>
                                    <li><a href="{!! route('cliente.create') !!}" title="Buttons"><span>Nuevo Cliente</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Colores</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('colors.index') !!}" title="Labels &amp; Badges"><span>Listado de Colores</span></a></li>
                                    <li><a href="{!! route('colors.create') !!}" title="Buttons"><span>Nuevo Color</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Marcas</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('marcas.index') !!}" title="Labels &amp; Badges"><span>Listado de Marcas</span></a></li>
                                    <li><a href="{!! route('marcas.create') !!}" title="Buttons"><span>Nueva Marca</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0);" title="Administración"><i class="glyph-icon icon-linecons-diamond"></i> <span>Modelos</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{!! route('modelos.index') !!}" title="Labels &amp; Badges"><span>Listado de Modelos</span></a></li>
                                    <li><a href="{!! route('modelos.create') !!}" title="Buttons"><span>Nuevo Modelo</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="page-content-wrapper">
                <div id="page-content">
                    <div id="page-header">
                        <div id="header-nav-left">
                            <div class="user-account-btn dropdown">
                                <a  title="My Account" class="user-profile clearfix" data-toggle="dropdown"><img width="28" src="{{ asset('image-resources/no-usuario.png') }}" alt="Profile image"> <span>Juan Lopez</span> <i class="glyph-icon icon-angle-down"></i></a>
                                <div class="dropdown-menu float-right">
                                    <div class="box-sm">
                                        <div class="login-box clearfix">
                                            <div class="user-img"><a  title="" class="change-img">Cambiar Imagen</a> <img src="{{ asset('image-resources/no-usuario.png') }}" alt=""></div>
                                            <div class="user-info"><span>Juan Lopez<i>Vendedor</i></span> <a  title="Edit profile">Editar perfil</a>
                                              <!-- <a href="tile-boxes.html#" title="View notifications">View notifications</a> -->
                                            </div>
                                        </div>
                                        <div class="button-pane button-pane-alt pad5L pad5R text-center"><a href="{{ url('/logout') }}" class="btn btn-flat display-block font-normal btn-danger"><i class="glyph-icon icon-power-off"></i> Cerrar sesión</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="header-nav-right">
                          <a  class="hdr-btn popover-button" title="Buscar" data-placement="bottom" data-id="#popover-search"><i class="glyph-icon icon-search"></i></a>
                            <div class="hide" id="popover-search">
                                <div class="pad5A box-md">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar un pedido"> <span class="input-group-btn"><a class="btn btn-primary" >Buscar</a></span></div>
                                </div>
                            </div>
                            <a  class="hdr-btn" id="fullscreen-btn" title="Fullscreen"><i class="glyph-icon icon-arrows-alt"></i></a>
                        </div>
                    </div>
                    @yield('content')
                </div>
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
        <script type="text/javascript" src="{{ asset('js-init/widgets-init.js') }}"></script>
        <script type="text/javascript" src="{{ asset('themes/admin/layout.js') }}"></script>
        <script type="text/javascript" src="{{ asset('widgets/datatable/datatable.js') }}"></script>
                <script type="text/javascript" src="{{ asset('widgets/datatable/datatable-bootstrap.js') }}"></script>
                <script type="text/javascript" src="{{ asset('widgets/datatable/datatable-responsive.js') }}"></script>
                <script type="text/javascript">
                    /* Datatables responsive */

                    $(document).ready(function() {
                        $('#datatable-responsive').DataTable({
                            responsive: true
                        });
                    });

                    $(document).ready(function() {
                        $('.dataTables_filter input').attr("placeholder", "Buscar...");
                    });
                </script>
        <!-- <script type="text/javascript">
        $(function () {
          $('#demo-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
          })
          .on('form:submit', function() {
            return false; // Don't submit form for this demo
          });
        });
        </script> -->

    </div>
    <script type="text/javascript" src="{{ asset('widgets/spinner/spinner.js') }}"></script>
    <script type="text/javascript">
        /* jQuery UI Spinner */

        $(function() {
            "use strict";
            $(".spinner-input").spinner();
        });
    </script>
    <script type="text/javascript" src="{{ asset('widgets/autocomplete/autocomplete.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/autocomplete/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/autocomplete/autocomplete-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/touchspin/touchspin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/touchspin/touchspin-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/input-switch/inputswitch.js') }}"></script>
    <script type="text/javascript">
        /* Input switch */

        $(function() {
            "use strict";
            $('.input-switch').bootstrapSwitch();
        });
    </script>
    <script type="text/javascript" src="{{ asset('widgets/textarea/textarea.js') }}"></script>
    <script type="text/javascript">
        /* Textarea autoresize */

        $(function() {
            "use strict";
            $('.textarea-autosize').autosize();
        });
    </script>
    <script type="text/javascript" src="{{ asset('widgets/multi-select/multiselect.js') }}"></script>
    <script type="text/javascript">
        /* Multiselect inputs */

        $(function() {
            "use strict";
            $(".multi-select").multiSelect();
            $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
        });
    </script>
    <script type="text/javascript">
    $(function () {
      if($('#demo-form').parsley() != undefined)
      {

              $('#demo-form').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
              })
              .on('form:submit', function() {
                return false; // Don't submit form for this demo
              });
        }
            });
    </script>
    <script type="text/javascript" src="{{ asset('widgets/uniform/uniform.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/uniform/uniform-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/chosen/chosen.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/chosen/chosen-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/parsley/parsley.js') }}"></script>
</body>

</html>
