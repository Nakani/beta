
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Diana - @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

        <link href="{{ url('/') }}/scripts/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

        @yield('plugins_style')
        <link href="{{ url('/') }}/scripts/layouts/layout2/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <!-- <link href="{{ url('/') }}/scripts/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" /> -->
        <link href="{{ url('/') }}/scripts/global/custom.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/img/favicon-16x16.png">

        @yield('view_style')
        <!-- Perfil -->
        <link href="{{ url('/') }}/scripts/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- end perfil -->
        <!-- Mapa Ativo -->
        
<!--         <script src="https://www.gstatic.com/firebasejs/3.7.5/firebase.js"></script>
        <script src="https://cdn.firebase.com/libs/geofire/4.1.2/geofire.min.js"></script> -->
        <script src="{{ url('/') }}/scripts/global/plugins/jquery.min.js" type="text/javascript"></script>
        
        <script src="{{ url('/') }}/scripts/utils.js" type="text/javascript"></script>
        <!-- END Mapa Ativo -->
        <script>    
            var url ='{{ url('/') }}';
        </script>
        @yield('endhead_script')
    </head>
    <!-- END HEAD -->
