<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>DashBoard Cadastro</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Painel Adminstrativo para gerenciar app Diana " name="Diana Painel" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ url('/') }}/scripts/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ url('/') }}/scripts/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ url('/') }}/scripts/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('/') }}/scripts/pages/css/login-2.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/img/favicon-16x16.png">
        </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="#">
                <!-- <img st src="{{ url('/') }}/img/logo.png"  alt="" /> </a> -->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ url('/cadastro') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-title">
                    <span class="form-subtitle">Cadastro.</span>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Entre com seu email e senha. </span>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nome</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nome" name="name" /> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">email</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> 
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">senha</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="password" /> 
                </div>               

                <div class="form-actions">
                    <button type="submit" class="btn btn-block uppercase botaoLogin">Cadastrar</button>
                </div>

            </form>
        </div>
        <div class="copyright hide"> 2018 © Dashboard. </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
<script src="{{ url('/') }}/scripts/global/plugins/respond.min.js"></script>
<script src="{{ url('/') }}/scripts/global/plugins/excanvas.min.js"></script>
<script src="{{ url('/') }}/scripts/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ url('/') }}/scripts/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('/') }}/scripts/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/scripts/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ url('/') }}/scripts/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ url('/') }}/scripts/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
