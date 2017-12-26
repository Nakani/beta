<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie-browser" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/img/favicon-16x16.png">
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <title>Recuperar minha senha</title>

	<script type="text/javascript" src="/js/jquery-3.2.0.min.js"></script>
    <script>
    	var data = {token: '{{$token}}', email: '{{$email}}'};
    	function resetPassword()
    	{
    		var pwd = $('input[name=password]').val();
    		var pwd_confirm = $('input[name=password_confirm]').val();

    		if(pwd != pwd_confirm)
    		{
    			alert('As senhas n�o conferem');
    			return;
    		}
    		if(pwd.length < 6)
    		{
    			alert('Sua senha deve possuir no máximo 6 caracteres');
    			return;
    		}
    		$('#btnLabel').text('Enviando..');
    		data.password 				= pwd;
    		data.password_confirmation 	= pwd_confirm;
    		$.post('/api/password/reset', data, function(rs) {
    			resetButton();
    			if(rs.result)
    			{
    				$('#pageBody').html('<div class="success">Senha alterada com sucesso!<br/>Você já pode logar no aplicativo com sua nova senha</div>');
    				$('#pageInfo').remove();
    			}
    			if(rs.error)
    				alert(rs.error.msg);

    		}) .fail(function(err) {
    			resetButton();
    			alert('Erro');
    		  });

    	}

    	function resetButton(){
    		$('#btnLabel').text($('#btnLabel').attr('default-label'));
    	}
	</script>
    <style type="text/css" id="media-query">
      body {
  margin: 0;
  padding: 0; }

table {
  border-collapse: collapse;
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

.ie-browser .col, [owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 480px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 160px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 320px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 240px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 160px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 120px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 96px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 80px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 68px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 60px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 53px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 48px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 43px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 40px !important; }

@media only screen and (min-width: 500px) {
  .block-grid {
    width: 480px !important; }
  .block-grid .col {
    display: table-cell;
    Float: none !important;
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 480px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 160px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 320px !important; }
  .block-grid.two-up .col {
    width: 240px !important; }
  .block-grid.three-up .col {
    width: 160px !important; }
  .block-grid.four-up .col {
    width: 120px !important; }
  .block-grid.five-up .col {
    width: 96px !important; }
  .block-grid.six-up .col {
    width: 80px !important; }
  .block-grid.seven-up .col {
    width: 68px !important; }
  .block-grid.eight-up .col {
    width: 60px !important; }
  .block-grid.nine-up .col {
    width: 53px !important; }
  .block-grid.ten-up .col {
    width: 48px !important; }
  .block-grid.eleven-up .col {
    width: 43px !important; }
  .block-grid.twelve-up .col {
    width: 40px !important; } }

@media (max-width: 500px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth {
    max-width: 100% !important; } }

	input[type="password"] {
		display: block;
		border: #bbbbbb 1px solid;
		font-size: 20px;
		padding: 10px 10px;
		margin: 3px 0 10px 0;
		border-radius: 8px;
		width: 300px;
	}
	input[type="password"]:focus
	{
		border-color:#25A58C;
	}

	.label {
		display:block;
		font-weight:bold;
		font-size:14px;
		margin-top:10px;
		font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;
		color:#555555;
	}

	.success {
		padding: 40px 0 40px;
		text-align:center;
		font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;
		color:#555555;
		font-size:20px;
	}
    </style>
</head>
<!--[if mso]>
<body class="mso-container" style="background-color:#FFFFFF;">
<![endif]-->
<!--[if !mso]><!-->
<body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF">
<!--<![endif]-->
  <div class="nl-container" style="min-width: 320px;Margin: 0 auto;background-color: #FFFFFF">

    <div style="background-color:#25A58C;">
      <div rel="col-num-container-box" style="Margin: 0 auto;min-width: 320px;max-width: 480px;width: 320px;width: calc(17000% - 84520px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#25A58C;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 480px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center"  width="480" style=" width:480px; padding-right: 0px; padding-left: 0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div rel="col-num-container-box" class="col num12" style="min-width: 320px;max-width: 480px;width: 320px;width: calc(16000% - 76320px);background-color: transparent;">
               <div style="background-color: transparent; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;">
                  <div style="line-height: 20px; font-size:1px">&nbsp;</div>



<div align="left" style="Margin-right: 0px;Margin-left: 0px;">
  <a href="garupa.co" target="_blank">
    <img class="left" align="left" border="0" src="http://garupaweb.herokuapp.com/img/logo.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;float: none;width: 100%;max-width: 330px" width="328">
  </a>

</div>


<div style="Margin-right: 10px; Margin-left: 10px;">
  <div style="line-height: 30px; font-size: 1px">&nbsp;</div>
	<div style="font-size:12px;line-height:18px;color:#fff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 18px;line-height: 27px;text-align: left"><span style="font-size: 18px; line-height: 27px;"><span style="line-height: 27px; font-size: 18px;"></span></span></p></div>

</div>

                                  <div style="line-height: 20px; font-size: 1px">&nbsp;</div>
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
	<div style="background-color:transparent;" id="pageBody">
      <div rel="col-num-container-box" style="Margin: 0 auto;min-width: 320px;max-width: 480px;width: 320px;width: calc(17000% - 84520px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 480px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center"  width="480" style=" width:480px; padding-right: 0px; padding-left: 0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div rel="col-num-container-box" class="col num12" style="min-width: 320px;max-width: 480px;width: 320px;width: calc(16000% - 76320px);background-color: transparent;">
               <div style="background-color: transparent; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;">
                  <div style="line-height: 5px; font-size:1px">&nbsp;</div>


<div style="Margin-right: 10px; Margin-left: 10px;">
  <div style="line-height: 20px; font-size: 1px">&nbsp;</div>
	<!--div style="font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 12px;line-height: 14px;text-align: left"><span style="font-size: 18px; line-height: 21px;"><strong><span style="line-height: 21px; font-size: 18px;">Clique no botão abaixo para alterar sua senha:</span></strong></span></p></div-->

	<span class="label">Sua nova senha:</span>
	<input type="password" name="password"/>
	<span class="label">Confirme a senha:</span>
	<input type="password" name="password_confirm"/>

  <div style="line-height: 10px; font-size: 1px">&nbsp;</div>
</div>



<div align="left" class="button-container left" style="Margin-right: 10px;Margin-left: 10px;">
    <div style="line-height:10px;font-size:1px">&nbsp;</div>
  <a href="javascript:resetPassword()" target="_blank" style="color: #ffffff; text-decoration: none;width:300px;">
    <!--[if mso]>
      <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:62px; v-text-anchor:middle; width:279px;" arcsize="12%" strokecolor="#3AAEE0" fillcolor="#3AAEE0" >
      <w:anchorlock/><center style="color:#ffffff; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:16px;">
    <![endif]-->
    <!--[if !mso]><!--><div style="color: #ffffff; background-color: #3AAEE0; border-radius: 7px; -webkit-border-radius: 7px; -moz-border-radius: 7px; max-width: 259px; width: auto; border-top: 0px solid transparent; border-right: 0px solid transparent; border-bottom: 0px solid transparent; border-left: 0px solid transparent; padding-top: 15px; padding-right: 30px; padding-bottom: 15px; padding-left: 30px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; text-align: center;"><!--<![endif]-->
      <span style="font-size:16px;line-height:32px;"><strong id="btnLabel" default-label="ALTERAR MINHA SENHA">ALTERAR MINHA SENHA</strong></span>
    <!--[if !mso]><!--></div><!--<![endif]-->
    <!--[if mso]>
          </center>
      </v:roundrect>
    <![endif]-->
  </a>
    <div style="line-height:10px;font-size:1px">&nbsp;</div>
</div>


                                  <div style="line-height: 5px; font-size: 1px">&nbsp;</div>
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>

	<div style="background-color:transparent;">
      <div rel="col-num-container-box" style="Margin: 0 auto;min-width: 320px;max-width: 480px;width: 320px;width: calc(17000% - 84520px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 480px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center"  width="480" style=" width:480px; padding-right: 0px; padding-left: 0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div rel="col-num-container-box" class="col num12" style="min-width: 320px;max-width: 480px;width: 320px;width: calc(16000% - 76320px);background-color: transparent;">
               <div style="background-color: transparent; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;">
                  <div style="line-height: 5px; font-size:1px">&nbsp;</div>


<!--[if !mso]><!--><div align="center" style="Margin-right: 10px;Margin-left: 10px;"><!--<![endif]-->
  <div style="line-height: 10px; font-size:1px">&nbsp;</div>
  <!--[if (mso)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px;padding-left: 10px;"><![endif]-->
  <div style="border-top: 1px solid #BBBBBB; width:100%; font-size:1px;">&nbsp;</div>
  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
  <div style="line-height:10px; font-size:1px">&nbsp;</div>
<!--[if !mso]><!--></div><!--<![endif]-->


<div style="Margin-right: 10px; Margin-left: 10px;" id="pageInfo">
  <div style="line-height: 15px; font-size: 1px">&nbsp;</div>
	<div style="font-size:12px;line-height:24px;color:#aaaaaa;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 14px;line-height: 28px;text-align: left"><span style="color: rgb(51, 51, 51); font-size: 14px; line-height: 28px;">Obrigado por usar o Garupa.&nbsp;</span><strong><span style="color: #333333; font-size: 14px; line-height: 28px;">Se você não solicitou um resgate de senha ignore este e-mail.&nbsp;</span></strong><span style="color: rgb(51, 51, 51); font-size: 14px; line-height: 28px;">Se você precisar de ajuda envie um email para <a style="color:#25A58C;text-decoration: underline;" title="contato@garupa.co" href="mailto:contato@garupa.co">contato@garupa.co</a> ou entre em nossa <a style="color:#25A58C;text-decoration: underline;" href="https://www.facebook.com/garupaapp" target="_blank" rel="noopener noreferrer">Página do Facebook</a>.</span></p></div>

  <div style="line-height: 20px; font-size: 1px">&nbsp;</div>
</div>


<!--[if !mso]><!--><div align="center" style="Margin-right: 10px;Margin-left: 10px;"><!--<![endif]-->
  <div style="line-height: 10px; font-size:1px">&nbsp;</div>
  <!--[if (mso)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px;padding-left: 10px;"><![endif]-->
  <div style="border-top: 1px solid #BBBBBB; width:100%; font-size:1px;">&nbsp;</div>
  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
  <div style="line-height:10px; font-size:1px">&nbsp;</div>
<!--[if !mso]><!--></div><!--<![endif]-->

                                  <div style="line-height: 5px; font-size: 1px">&nbsp;</div>
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:#FFFFFF;">
      <div rel="col-num-container-box" style="Margin: 0 auto;min-width: 320px;max-width: 480px;width: 320px;width: calc(17000% - 84520px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#FFFFFF;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 480px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center"  width="480" style=" width:480px; padding-right: 0px; padding-left: 0px; border-top: 0px solid #D9D9D9; border-left: 0px solid #D9D9D9; border-bottom: 0px solid #D9D9D9; border-right: 0px solid #D9D9D9;" valign="top"><![endif]-->
            <div rel="col-num-container-box" class="col num12" style="min-width: 320px;max-width: 480px;width: 320px;width: calc(16000% - 76320px);background-color: transparent;">
               <div style="background-color: transparent; border-top: 0px solid #D9D9D9; border-left: 0px solid #D9D9D9; border-bottom: 0px solid #D9D9D9; border-right: 0px solid #D9D9D9;">


<div style="Margin-right: 10px; Margin-left: 10px;">
  <div style="line-height: 10px; font-size: 1px">&nbsp;</div>
	<div style="font-size:12px;line-height:24px;color:#FFF;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 12px;line-height: 24px;text-align: left"><span style="font-size: 12px; line-height: 24px;"><a style="color:#25A58C;text-decoration: underline;" href="http://garupa.co/sobre" target="_blank" rel="noopener noreferrer">Sobre</a>&nbsp; &nbsp;&nbsp;<a style="color:#25A58C;text-decoration: underline;" href="http://garupa.co/contato" target="_blank" rel="noopener noreferrer">Contato</a> &nbsp;&nbsp; &nbsp;<a style="color:#25A58C;text-decoration: underline;" href="http://garupa.co/notas-legais" target="_blank" rel="noopener noreferrer">Notas legais</a></span></p><p style="margin: 0;font-size: 12px;line-height: 24px;text-align: left"><span style="font-size: 12px; line-height: 24px; color: rgb(51, 51, 51);">Garupa 2017. Todos os direitos reservados</span></p></div>

  <div style="line-height: 10px; font-size: 1px">&nbsp;</div>
</div>

                                  <div style="line-height: 30px; font-size: 1px">&nbsp;</div>
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>  </div>


</body></html>
