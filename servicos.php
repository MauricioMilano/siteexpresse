<?php include "config.php"; ?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="expresse! - Empresa Júnior de Comunicação da UERJ">
        <meta name="keywords" content="Empresa, Júnior, expresse!, Comunicação Social">
        <meta name="author" content="InJunior">

        <title>expresse! - Serviços</title>
        <link rel="shortcut icon" type="image/png" href="img/e!.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/expresse.css" rel="stylesheet">
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/sidePage.css" rel="stylesheet">
        <link href="css/port-effect.css" rel="stylesheet">
        

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
        <script src="js/jquery-1.11.3.min.js"></script>
        
    </HEAD>
        
        <!--INICIO DO HEADER BOLADÃO-->

        <BODY>       
        
		    <?php include_once('menu.html') ?>
        
         <!-- FIM DO HEADER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->
          <img src="img/grafico_superior.png" class="img-responsive" style="float:right;margin-top:55px"/>
          <div class="container batatinha container-padding ct-anim">
             <div class=""><img class="img-responsive" src="img/uploads/<?php $db = conecta_bd(); foreach ($db->query("SELECT nome FROM imagens WHERE imagens.fk_pag = 3 ORDER BY id_img ASC") as $row){}echo $row['nome'];?>"/></div>

            <div class="titulozao"><h1>Serviços</h1></div>
            <?php foreach ($db->query("SELECT conteudo FROM textos WHERE textos.fk_tipo = 12 ORDER BY id_texto ASC") as $row){}?>
                <article><p><?php echo $row['conteudo']; ?></p></article>
            <?php 
                $db = conecta_bd(); 
                foreach ($db->query("SELECT id_topico, titulo, conteudo FROM topicos WHERE topicos.fk_pag = 3 ORDER BY id_topico ASC") as $row){ 
            ?>
            <div class="titulozao"><h1><?php echo $row['titulo']; ?></h1></div>
            
            <article><p><?php echo $row['conteudo']; ?></p></article>
            
            <?php 
                foreach ($db->query("SELECT id_texto, titulo, conteudo FROM textos WHERE textos.fk_topico = ".$row['id_topico']." ORDER BY id_texto ASC") as $row2){
            ?>    

            <div class="titulozao"><h2>&#8226 <?php echo $row2['titulo']; ?></h2></div>

            <article><p><?php echo $row2['conteudo']; ?></p></article>

            <?php } ?>
            
            <?php }?>
            


            <!-- <div class="titulozao"><h1>Criação Gráfica</h1></div>

            <article><p>O serviço de criação gráfica consiste no desenvolvimento de uma identidade visual e na criação de artes para os mais variados materiais de divulgação, como cartões de visita, folders e banners. O objetivo é aumentar a visibilidade da marca, levando esta a cada vez mais lugares.</p></article>
            -->
          </div> 

          <img  src="img/grafico_inferior.png" class="img-responsive"/>
        <!--INICIO DO FOOTER BOLADÃO-->
        <?php include_once('footer.html') ?>
        <!-- FIM DO FOOTER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->
      	
	</BODY>
</HTML>