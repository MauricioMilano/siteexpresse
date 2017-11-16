<?php 
	if (isset($_POST) AND (!empty($_POST['usuario']) AND !empty($_POST['senha']))) {
    
        include "../config.php";
        $db = conecta_bd(); 
        $usuario = $_POST['usuario'];
        $senha = sha1($_POST['senha']); 
               
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ? ");
        $stmt->bindParam(1, $usuario, PDO::PARAM_STR);
        $stmt->bindParam(2, $senha, PDO::PARAM_STR);
        $stmt->execute();
        $nRows = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $nRows['nome'];  
        
        if ($nRows <= 0 ){
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
            die();
        }else{

            // Se a sessão não existir, inicia uma
            if (!isset($_SESSION))session_start();
            
            session_regenerate_id();
            
            // Salva os dados encontrados na sessão
            $_SESSION['UsuarioID'] = $usuario;
            $_SESSION['UsuarioNome'] = $nome;
            $_SESSION["sessiontime"] = time() + 40;

            // Redireciona o visitante
            header("Location: index.php"); exit;
            
            
        }
    }
    else {}            

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/expresse.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <title>Login · expresse!</title>
    <link rel="icon" type="image/png" sizes="96x96" href="../img/e!.png">

    <style type="text/css">
        a{
            color: #87a6bc;
        }

        body{
            background-color: #e9eff3;
        }

        #imagem{
            max-width: 150px;
            margin: auto;
            margin-top: 5px;
            margin-bottom: 5px;
            display: block;

        }

        #logBot{
            background-color: #27B4CE;
            border-color: #008973;
        }

        #formulario{
            padding: 1px 24px 1px;
            max-width: 320px;
            margin: auto;
            background-color: white;
            box-shadow: 2px 2px 1px #888888;
            margin-bottom: 20px;
        }

        #tSenha{
            border-bottom: 1px solid rgba( 200, 215, 225, 0.5 );
            margin-bottom: 20px;
        }

        #ponteiro{
            cursor: pointer;
        }

        #containerTroca{
            display: none
        }

        #containerLogin{
            display: initial;
        }

        .link{
            margin-bottom: 20px;
            max-width: 320px;
            margin: auto;
            padding: 0px 24px 20px;
            color: #87a6bc;
            font-size: 13px;
        }

        .margem{
            margin-bottom: 20px;
        }

    </style>

</head>

<body>
    <div id="containerLogin" class="container">
        <form id="formulario" method="POST" action="login.php" autocomplete="off">
            <img id="imagem" src="../img/logo.png">
            <h2 class="form-signin-heading">Login</h2>
            <input type="text" name="usuario" class="form-control margem" placeholder="Digite seu login" required autofocus><br>
            <input type="password" name="senha" class="form-control margem" placeholder="Digite sua senha" required autofocus>
            <button class="btn btn-primary botoes-expresse btn-block margem" type="submit" id="logBot" name="entrar">Entrar</button>
            <a href="forms/perdeuSenha.php">Esqueceu sua senha?</a>
        </form>
        
  </div>

  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
