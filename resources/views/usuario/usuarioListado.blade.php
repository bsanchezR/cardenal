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
    <title>Usuarios</title>
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
          $('.dataTables_filter input').attr("placeholder", "Search...");
      });
  </script>

                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">Listado Usuarios</h3>
                            <div class="example-box-wrapper">
                              <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th>Nombre</th>
                                          <th>Telefono</th>
                                          <th>Correo</th>
                                          <th>Tipo Usuario</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Tipo Usuario</th>
                                        <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                      <tr>
                                          <td>Tiger Nixon</td>
                                          <td>System Architect</td>
                                          <td>Edinburgh</td>
                                          <td>61</td>
                                          <td>2011/04/25</td>

                                      </tr>
                                      <tr>
                                          <td>Garrett Winters</td>
                                          <td>Accountant</td>
                                          <td>Tokyo</td>
                                          <td>63</td>
                                          <td>2011/07/25</td>

                                      </tr>
                                      <tr>
                                          <td>Ashton Cox</td>
                                          <td>Junior Technical Author</td>
                                          <td>San Francisco</td>
                                          <td>66</td>
                                          <td>2009/01/12</td>

                                      </tr>
                                      <tr>
                                          <td>Cedric Kelly</td>
                                          <td>Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>

                                      </tr>
                                      <tr>
                                          <td>Airi Satou</td>
                                          <td>Accountant</td>
                                          <td>Tokyo</td>
                                          <td>33</td>
                                          <td>2008/11/28</td>

                                      </tr>
                                      <tr>
                                          <td>Brielle Williamson</td>
                                          <td>Integration Specialist</td>
                                          <td>New York</td>
                                          <td>61</td>
                                          <td>2012/12/02</td>

                                      </tr>
                                      <tr>
                                          <td>Herrod Chandler</td>
                                          <td>Sales Assistant</td>
                                          <td>San Francisco</td>
                                          <td>59</td>
                                          <td>2012/08/06</td>

                                      </tr>
                                      <tr>
                                          <td>Rhona Davidson</td>
                                          <td>Integration Specialist</td>
                                          <td>Tokyo</td>
                                          <td>55</td>
                                          <td>2010/10/14</td>

                                      </tr>
                                      <tr>
                                          <td>Colleen Hurst</td>
                                          <td>Javascript Developer</td>
                                          <td>San Francisco</td>
                                          <td>39</td>
                                          <td>2009/09/15</td>

                                      </tr>
                                      <tr>
                                          <td>Sonya Frost</td>
                                          <td>Software Engineer</td>
                                          <td>Edinburgh</td>
                                          <td>23</td>
                                          <td>2008/12/13</td>

                                      </tr>
                                      <tr>
                                          <td>Jena Gaines</td>
                                          <td>Office Manager</td>
                                          <td>London</td>
                                          <td>30</td>
                                          <td>2008/12/19</td>

                                      </tr>
                                      <tr>
                                          <td>Quinn Flynn</td>
                                          <td>Support Lead</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2013/03/03</td>

                                      </tr>
                                      <tr>
                                          <td>Charde Marshall</td>
                                          <td>Regional Director</td>
                                          <td>San Francisco</td>
                                          <td>36</td>
                                          <td>2008/10/16</td>

                                      </tr>
                                  </tbody>
                              </table>
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
        <script type="text/javascript">
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
        </script>
    </div>
</body>
</html>
