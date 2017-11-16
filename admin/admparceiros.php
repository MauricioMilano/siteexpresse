<?php include "../config.php"; ?>
<?php require("accessCheck.php"); ?>
<!doctype html>
<html lang="pt">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../img/e!.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Painel Administrativo</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/css/admin.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!-- Link Swiper's CSS -->
    <link href="assets/css/swiper.min.css" rel="stylesheet" >


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.expresseconsultoria.com.br" class="simple-text">
                    Expresse
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="admhome.php">
                        <i class="ti-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li>
                    <a href="admsobre.php">
                        <i class="ti-comment-alt"></i>
                        <p>Quem somos</p>
                    </a>
                </li>
                
                <li>
                    <a href="admservicos.php">
                        <i class="ti-briefcase"></i>
                        <p>Serviços</p>
                    </a>
                </li>
                
                <li class="active">
                    <a href="admparceiros.php">
                        <i class="ti-thumb-up"></i>
                        <p>Parceiros</p>
                    </a>
                </li>
                <li>
                    <a href="admportifolio.php">
                        <i class="ti-map"></i>
                        <p>Portifolio</p>
                    </a>
                </li>
                <li>
                    <a href="admusuarios.php">
                        <i class="ti-user"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li>
                    <div class="nav-session"><p>Sua sessão expira em: </p><div id="sessao"></div></div>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <?php include 'navbar.html'; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Painel de administração dos Parceiros</h4>
                                <section class="adm-adicionar">
                                    <section class="input-confirma">
                                        <p>Atenção! Certifique-se de que está tudo correto.</p>
                                    </section>
                                </section>
                            </div>
                            <div class="content">
                                <section class="bt-line">
                                    <h3 class="title">Imagens dos Parceiros</h3>
                                    <div class="row">
                                    <?php $db = conecta_bd(); foreach ($db->query("SELECT nome FROM imagens WHERE imagens.fk_pag = 5 ORDER BY id_img ASC") as $row){ ?>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 adm-img">
                                            <img class="img-responsive img-thumbnail" src="../img/uploads/<?php echo $row['nome'];?>">
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="row">    
                                        <div class="col-lg-4 col-md-4"></div>
                                        <div class="col-lg-4 col-md-4">
                                            <button type="button" class="btn btn-info btn-lg btn-adm" data-toggle="modal" data-target="#myModalParceiros">Gerenciar</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4"></div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $db = NULL; ?>
        <?php include 'footer.html'; ?>
    </div>
</div>

<div class="container">
    <div class="modal fade" id="myModalParceiros" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Gerenciar Parceiros</h4>
            </div>
            <div class="modal-body">
            <div class="row">    
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-3 col-md-3 center"><button class="adm-btn btn btn-success" type="button" onclick="load_img_parceiros()">Adicionar</button></div>
                <div class="col-lg-3 col-md-3 center"><button class="adm-btn btn btn-danger" type="button" onclick="delete_img_parceiros()">Deletar</button></div>
                <div class="col-lg-3 col-md-3"></div>
            </div>    
            <section class="adm-area" id="div1"> 
                <section  id ="area1" class="center">
                    
                </section>
            </section>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/contador.js"></script>

    <script src="forms/assets/js/form_control.js"></script>

    <!-- Swiper JS -->
    <script src="assets/js/swiper.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-gift',
                message: "Bem vindo ao <b>Painel Administrativo</b> - faça aqui as modificações em seu site."

            },{
                type: 'success',
                timer: 2000
            });

        });
    </script>
</html>
