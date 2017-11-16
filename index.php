<?php include "config.php"; ?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
 
		    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="expresse! - Empresa Júnior de Comunicação da UERJ">
        <meta name="keywords" content="Empresa, Júnior, expresse!, comunicação">
        <meta name="author" content="InJunior">

        <title>expresse! - consultoria</title>
        <link rel="shortcut icon" type="image/png" href="img/e!.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/sidePage.css" rel="stylesheet">
        <link href="css/expresse.css" rel="stylesheet">
        <link href="css/estiloHome.css" rel="stylesheet">

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
        body{
          background-color: grey;
        }
        </style>

	</HEAD>
    <BODY>    
        <?php include_once('menu.html') ?>
        
        <div id="fotoerj" style="background-image: url('img/uploads/<?php $db = conecta_bd(); foreach ($db->query("SELECT nome FROM imagens WHERE imagens.fk_pag = 1 ORDER BY id_img ASC") as $row){}echo $row['nome'];?>')"> 
        </div>
        
        <div id="slogam">
            <p id="text-slogam"> 
                <?php
                    //$db = new PDO('sqlite:/home/u773852884/public_html/db/expresse.db') or die;
                    $db = conecta_bd();
                    //visualiza
                    foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 1 ORDER BY id_texto ASC") as $row) 
                    {

                    }
                    echo $row['conteudo'];
                ?>
            </p>
        </div>

      	<DIV class="col-lg-3 col-md-6 col-sm-6 col-xs-12 quadrados" style="background-color:#E3A542">
      		<p class="text-box">
                <?php
                    //visualiza
                    foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 2") as $row) 
                    {
                    
                    }
                    echo $row['conteudo'];
                ?>
            </p>
      	</DIV>
        <DIV class="col-lg-3 col-md-6 col-sm-6 col-xs-12 quadrados" style="background-color:#27B4CE">
      			<p class="text-box">
                <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 3") as $row) 
                {
                
                }
                echo $row['conteudo'];
                ?>
                </p>
        </DIV>
      	<DIV class="col-lg-3 col-md-6 col-sm-6 col-xs-12 quadrados" style="background-color:#209FAD">
      		<p class="text-box">
                <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 4") as $row) 
                {
               
                }
                echo $row['conteudo'];
                ?>
            </p>
      	</DIV>
      	<DIV class="col-lg-3 col-md-6 col-sm-6 col-xs-12 quadrados" style="background-color:#F19F1E">
      	    <p class="text-box">
                <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 5") as $row) 
                {
                
                }
                echo $row['conteudo'];
                ?>
            </p>
        </DIV>
        
        <?php include_once('footer.html') ?>
        
	</BODY>
</HTML>