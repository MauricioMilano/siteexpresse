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

        <title>expresse! - Quem Somos</title>
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

  </HEAD>
    <!--INICIO DO HEADER BOLADÃO-->
        
    <?php include_once('menu.html') ?>
        
    
      <img src="img/grafico_superior.png" class="img-responsive" style="float:right;margin-top:55px"/>

      <div class="container batatinha container-padding">

      <div class="titulozao"><h1>Sobre a expresse!</h1></div>
      <article>
        <p>
          <?php
              //$db = new PDO('sqlite:/home/u773852884/public_html/db/expresse.db') or die;
              $db = conecta_bd(); 
              //visualiza
              foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 6 ORDER BY id_texto ASC") as $row) 
              {

              }
              echo $row['conteudo'];
          ?>
        </p>
      </article>

      <div class="">
        <div class=""><img class="img-responsive img-thumbnail" src="img/uploads/<?php $db = conecta_bd(); foreach ($db->query("SELECT nome FROM imagens WHERE imagens.fk_pag = 2 ORDER BY id_img ASC") as $row){}echo $row['nome'];?>"/>
        </div>
      </div>

      <div class="row bigger-text">
      <div class="col-sm-4 text-center">
        <h2 style="border-bottom:2px solid #f19f1e;">Missão</h2>
        <p class="pre-line">
            <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 7") as $row) 
                {
                
                }
                echo $row['conteudo'];
            ?>
        </p>
      </div>
      <div class="col-sm-4 text-center">
        <h2 style="border-bottom:2px solid #f19f1e;">Visão</h2>
        <p class="pre-line">
            <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 8") as $row) 
                {
                
                }
                echo $row['conteudo'];
            ?>
        </p>
      </div>
      <div class="col-sm-4 text-center">
        <h2 style="border-bottom:2px solid #f19f1e;">Valores</h2>
        <p class="pre-line">
            <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 9") as $row) 
                {
                
                }
                echo $row['conteudo'];
            ?>
        </p>
      </div>
    </div>


      <div class="titulozao"><h1>O MEJ</h1></div>
      <article>
        <p>
            <?php
                //visualiza
                foreach ($db->query("SELECT conteudo FROM textos where textos.fk_tipo = 10") as $row) 
                {
                
                }
                echo $row['conteudo'];
            ?>
        </p>
      </article>
    
    </div>
    <!-- <div style="width:100%; height:1%; background-color:grey"></div> -->
    


    <!-- <div style="width:100%; height:1%; background-color:grey"></div> -->

      <!-- <img  src="mini-infográfico-5.png" class="img-responsive"/> -->

   <!-- <div style="width:100%; height:1%; background-color:grey"></div> -->

     
    <img  src="img/grafico_inferior.png" class="img-responsive"/>
    <div style="width:100%; height:1%; background-color:grey"></div>    


    <!-- INICIO DO FOOTER BOLADÃO -->
      <?php include_once('footer.html') ?>
        
        <!-- FIM DO FOOTER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->
        

  </BODY>
</HTML>