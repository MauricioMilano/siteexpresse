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

        <title>expresse! - Portfólio e Parceiros</title>
        <link rel="shortcut icon" type="image/png" href="img/e!.png"/>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/expresse.css" rel="stylesheet">
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/sidePage.css" rel="stylesheet">
        <link href="css/swiper.min.css" rel="stylesheet">
        <link href="css/swiper.css" rel="stylesheet">
        <link href="css/port-effect.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
        .thumbnail{
          height: 170px;
        }
        .navbar-wrapper {
        /* Fallback for web browsers that doesn't support RGBa */
        background: rgb(255, 255, 255);
        /* RGBa with 0.6 opacity */
        background: rgba(255, 255, 255, 0.95);
        }
        </style>
        <script src="js/jquery-1.11.3.min.js"></script>
        
    </HEAD>
        
    <BODY>    
        <!--INICIO DO HEADER BOLADÃO-->
        
		<?php include_once('menu.html') ?>
        
        <img src="img/grafico_superior.png" class="img-responsive" style="float:right;margin-top:55px"/>
        
        <div class="container batatinha container-padding">
    
            <div class="titulozao"><h1>Portfólio</h1></div>
            <p class="t-info">Clique na imagem para saber mais!</p>
            <div class="row expresse-portifolio-parceiros-col-padding">
            <?php $db = conecta_bd(); 
                    foreach ($db->query("SELECT id_img, nome, descricao, titulo FROM imagens WHERE imagens.fk_pag = 4 ORDER BY imagens.id_img ASC") as $row){ 
                    ?>
                    <A href="#myModal<?php echo $row['id_img']; ?>"><img data-toggle="modal" data-target="#myModal<?php echo $row['id_img']; ?>" class="p-img img-responsive img-thumbnail" style="width:240px;height:240px;" src="img/uploads/<?php echo $row['nome']; ?>" alt=""/></A>
                    <!-- Modal -->
                    <div id="myModal<?php echo $row['id_img']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title"><?php echo $row['titulo']; ?></h2>
                          </div>
                          <div class="modal-body">
                            <div class="mb-parg"><p><?php echo $row['descricao']; ?></p></div>
                            <div class="pup-img center imgExpande"><img class="img-thumbnail" src="img/uploads/<?php echo $row['nome']; ?>" alt=""/> </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <?php } ?>
                    
                    
                    
            </div>
            


            <div class="titulozao"><h1>Parceiros</h1></div>
        
            <div id="parc" class="pcr-container">
                <div class="row expresse-clientes-parceiros-col-padding">
                  <span style="color: transparent;">
                    <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php $db = conecta_bd(); 
                        foreach ($db->query("SELECT id_img, fk_pag, nome, descricao, titulo FROM imagens WHERE imagens.fk_pag = 5 ORDER BY imagens.id_img ASC") as $row){ 
                        ?>
                        <div class="swiper-slide">
                            <img class="img-responsive img-thumbnail ssp-img" src="img/uploads/<?php echo $row['nome']; ?>" alt=""/>
                        </div>
                        <?php } ?>
                    </div>
                             
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                      
                </div>
                        
                  </span>
        		</div>
            </div>

        </div> 
        
        <img  src="img/grafico_inferior.png" class="img-responsive"/>
        <!--INICIO DO FOOTER BOLADÃO-->
        
        <?php include_once('footer.html') ?>
        
        <!-- FIM DO FOOTER BOLADÃO (para fins de Ctrl+c Ctrl+v)-->

         <!-- Swiper JS -->
        <script src="js/swiper.min.js"></script>
      
        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false
        });
        </script>
        
      	
	</BODY>
</HTML>