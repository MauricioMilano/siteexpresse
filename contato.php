<?php
include("conf.php");
$sentWithSuccess = NULL;
    if(isset($_POST['inputNome']) && isset($_POST['inputEmail']) && isset($_POST['inputAssunto']) && isset($_POST['inputMensagem']))
    {
        $user = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $assunto = $_POST['inputAssunto'];
        $body= str_replace("\n.", "\n..",strip_tags($_POST['inputMensagem']));

        $message = <<<BODY

        A seguinte mensagem lhe foi enviada pela pagina de Contato do site da expresse!:
        Nome: $user
        E-mail: $email
        $body

        --FIM DA MENSAGEM
BODY;
  
    include 'class.phpmailer.php';
    

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "lipeflorentino2@gmail.com";
    $mail->Password = "condor1010";
    $mail->setFrom($email, $user);
    $mail->AddReplyTo($email, $user);
    $mail->AddAddress("marketing@expresseconsultoria.com.br");
    $mail->Subject = $assunto;
    $mail->Body = $message;

    $envio = $mail->Send();
     
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
     
    // Exibe uma mensagem de resultado
    
      if($envio){
          echo "<script language='javascript' type='text/javascript'>alert('E-mail enviado com sucesso!');window.location.href='contato.php';</script>";
          
 
        } else {
          echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro, por favor contate o desenvolvedor');window.location.href='../login.php';</script>";
 
        }

    
    }

?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="expresse! consultoria - Empresa Júnior de Comunicação Social">
        <meta name="keywords" content="Empresa, Júnior, expresse, Comunicação Social">
        <meta name="author" content="InJunior">

        <title>expresse! - Contato</title>
        <link rel="shortcut icon" type="image/png" href="img/e!.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/expresse.css" rel="stylesheet">
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/sidePage.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
        .navbar-wrapper {
        /* Fallback for web browsers that doesn't support RGBa */
        background: rgb(255, 255, 255);
        /* RGBa with 0.6 opacity */
        background: rgba(255, 255, 255, 0.95);
        }
        </style>
        <style>
    .google-maps {
        position: relative;
       
        height: 400px;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" language="javascript">
        function valida_form (){        //Função que trata os campos não preenchidos do formulário

            var ok = true;

            if(document.getElementById("Mensagem").value == ""){
                var d = document.getElementById("divMensagem");
                d.className = "form-group has-error has-feedback alert alert-danger";
                document.getElementById("Mensagem").focus();
                document.getElementById("ErrMensagem").style.display = "block";
                ok = false;
            }
            else{
                var d = document.getElementById("divMensagem");
                d.className = "form-group";
                document.getElementById("ErrMensagem").style.display = "none";
            }

            if(document.getElementById("Email").value == ""){
                var d = document.getElementById("divEmail");
                d.className = "form-group has-error has-feedback alert alert-danger";
                document.getElementById("Email").focus();
                document.getElementById("ErrEmail").style.display = "block";
                document.getElementById("InvEmail").style.display = "none";
                ok = false;
            }
            else{
                var email = document.getElementById("Email").value;
                var filter = /[^\s@]+@[^\s@]+\.[^\s@]+/;

                if( filter.test(email) ){
                    var d = document.getElementById("divEmail");
                    d.className = "form-group";
                    document.getElementById("ErrEmail").style.display = "none";
                    document.getElementById("InvEmail").style.display = "none";
                }
                else {
                    var d = document.getElementById("divEmail");
                    d.className = "form-group has-warning has-feedback alert alert-warning";
                    document.getElementById("Email").focus();
                    document.getElementById("ErrEmail").style.display = "none";
                    document.getElementById("InvEmail").style.display = "block";
                }
            }

            if(document.getElementById("Nome").value == "" ){
                var d = document.getElementById("divNome");
                d.className = "form-group has-error has-feedback alert alert-danger";
                document.getElementById("Nome").focus();                //Bota o cursor no campo que não foi preenchido por último
                document.getElementById("ErrNome").style.display = "block";     //Habilitando a DIV da mensagem de erro
                ok = false;
            }
            else{                                                           //Caso o campo tenha sido preenchido, volta para a situação inicial
                var d = document.getElementById("divNome");
                d.className = "form-group";
                document.getElementById("ErrNome").style.display = "none";
            }

            if (ok) {
                var btn = $("#formulario").find("button[name='enviar']");
                btn.html("Enviando...");
                return true;
            }
            else {
                return false;
            }
        }
        </script>
    </HEAD>
        
        <!--INICIO DO HEADER BOLADÃO-->
        <img src="img/grafico_superior.png" class="img-responsive" style="float:right;margin-top:55px"/>
        
        <?php include_once('menu.html') ?>
        
        <!-- FIM DO HEADER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->

    
    
<script>
/*Se o navegador for o nativo do Android, então o menu é static e não fixed.*/
/*var nua = navigator.userAgent;
var is_android_native_browser = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
if (is_android_native_browser) {
  document.getElementById("expresse-menu").className = "navbar navbar-default navbar-static-top text-center";
}*/
</script>
    <div class="container text-justify container-padding contrato">
        <div class="page-header">
            <h1>Contato</h1>
        
        </div>        
        <?php 
            if(!is_null($sentWithSuccess)){
                if($sentWithSuccess) {
                    echo '<div class="alert alert-success" role="alert"><strong>Sucesso!</strong> Mensagem enviada.</div>';
                }
                else {
                    echo '<div class="alert alert-danger" role="alert"><strong>Erro!</strong> A mensagem não pôde ser enviada. Tente novamente mais tarde.</div>';
                }
            }
        ?>
        
        <br/>
        
        <form id="formulario" class="form-vertical" action = "contato.php" method="POST" onsubmit="return valida_form(this)">
            <div class="row">
                <div class="col-xs-12">

                    <div class="form-group" id="divNome">
                        <div>
                            <label>Nome</label>
                            <div id="ErrNome" style="display:none; font-size: 12px">
                                <strong>Campo Obrigatório</strong>
                            </div>
                            <input type="nome" class="form-control" name="inputNome" id="Nome" title="Digite seu nome">
                        </div>
                    </div>

                    <div class="form-group" id="divEmail">
                        <div>
                            <label>E-mail</label>
                            <div id="ErrEmail" style="display:none; font-size: 12px">
                                <strong>Campo Obrigatório</strong>
                            </div>
                            <div id="InvEmail" style="display:none; font-size: 12px">
                                <strong>E-mail inválido</strong>
                            </div>
                            <input type="email" class="form-control" name="inputEmail" id="Email" title="Entre com um e-mail válido">
                        </div>
                    </div>

                    <div class="form-group" id="divAssunto">
                        <div>
                            <label>Assunto</label>
                            <div id="ErrAssunto" style="display:none; font-size: 12px">
                                <strong>Campo Obrigatório</strong>
                            </div>
                            <input type="assunto" class="form-control" name="inputAssunto" id="Assunto" title="Entre com o assunto da mensagem">
                        </div>
                    </div>

                    <div class="form-group" id="divMensagem">
                        <label>Mensagem</label>
                        <div id="ErrMensagem" style="display:none; font-size: 12px">
                            <strong>Campo Obrigatório</strong>
                        </div>
                        <textarea name="inputMensagem" class="form-control" id="Mensagem" rows="5" title="Digite sua mensagem"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-default btn-block botoes-expresse" style="background-color:#27B4CE;" type="submit" name="enviar">Enviar</button>
                </div>
            </div>
        </form>
            
    </div>
    <style>
    .maps iframe{
        pointer-events: none;
    }
    .maps {
        cursor: pointer;
    }
    </style>

    <div style="height:350px; width: 100%; display: table; margin-bottom: -5px">
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.055243416788!2d-43.238433285468176!3d-22.911333143792305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e66930146d7%3A0x5d3a289bade80f76!2sR.+S%C3%A3o+Francisco+Xavier%2C+524+-+Maracan%C3%A3%2C+Rio+de+Janeiro+-+RJ!5e0!3m2!1spt-BR!2sbr!4v1462061383742" frameborder="0" style="border:0;margin:0" allowfullscreen></iframe>
      

        </div>
    </div>
        
    <!--INICIO DO FOOTER BOLADÃO-->
        
        <?php include_once('menu.html') ?>
        
        <!-- FIM DO FOOTER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->
        
        <?php include_once('footer.html') ?>
    </BODY>
</HTML>