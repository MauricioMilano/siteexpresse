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


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


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
                
                <li>
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
                                <h4 class="title">Bem vindo(a) <font color="#27B4CE"><?php echo $_SESSION['UsuarioNome']; ?></font></h4><br>
                                <p class="category">Para realizar suas alterações utilize o menu ao lado.</p>
                                <p class="category"> Problemas? </p>
                                <p class="category"> Entre em contato: contato@injunior.com.br </p>
                                <a href="http://www.injunior.com.br" class="simple-text">www.injunior.com.br</a>
                            </div>
                            <div class="content">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.html'; ?>
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
