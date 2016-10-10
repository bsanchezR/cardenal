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
    </style>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Login page 1</title>
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
    <div id="loading">
        <div class="svg-icon-loader"><img src="{{ asset('images/svg-loaders/bars.svg') }}" width="40" alt=""></div>
    </div>
    <style type="text/css">
        html,
        body {
            height: 100%;
        }
    </style>
    <div class="center-vertical bg-black">
        <div class="center-content">
            <form action="" id="login-validation" class="col-md-5 col-sm-5 col-xs-11 center-margin" method="">
                <h3 class="text-center pad25B font-gray font-size-23">Ramave <span class="opacity-80">v0.1</span></h3>
                <div id="login-form" class="content-box">
                    <div class="content-box-wrapper pad20A">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo:</label>
                            <div class="input-group input-group-lg"><span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-envelope-o"></i></span>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingresa tu correo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password:</label>
                            <div class="input-group input-group-lg"><span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-unlock-alt"></i></span>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="checkbox-primary col-md-6" style="height: 20px">
                                <label>
                                    <input type="checkbox" id="loginCheckbox1" class="custom-checkbox"> Remember me</label>
                            </div>
                            <div class="text-right col-md-6"><a href="login-1.html#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Forgot your password?</a></div>
                        </div> -->
                    </div>
                    <div class="button-pane">
                        <button type="submit" class="btn btn-block btn-primary">Iniciar</button>
                    </div>
                </div>
                <!-- <div id="login-forgot" class="content-box modal-content hide">
                    <div class="content-box-wrapper pad20A">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address:</label>
                            <div class="input-group input-group-lg"><span class="input-group-addon addon-inside bg-white font-primary"><i class="glyph-icon icon-envelope-o"></i></span>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                        </div>
                    </div>
                    <div class="button-pane text-center">
                        <button type="submit" class="btn btn-md btn-primary">Recover Password</button> <a href="login-1.html#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a></div>
                </div> -->
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
    <script type="text/javascript" src="{{ asset('js-init/widgets-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/admin/layout.js') }}"></script>
</body>

</html>
