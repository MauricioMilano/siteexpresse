<?php include "../../config.php"; ?>
<?php require("../accessCheck.php"); ?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/full-slider.css" rel="stylesheet">
        <link href="assets/css/sidePage.css" rel="stylesheet">
        <link href="assets/css/expresse.css" rel="stylesheet">
        <link href="assets/css/estiloHome.css" rel="stylesheet">


    </HEAD>
    
    <BODY> 
    <div class="adm-alert col-lg-12 col-md-12">
    <?php
    if(isset($_POST['slogan'])) {
    $db = conecta_bd();
    $slogan = $_POST['slogan'];

    $do = $db->exec("INSERT INTO textos (fk_tipo, conteudo, titulo, fk_pag) VALUES (10, '$slogan', NULL,2)");

    if ($do) {
        echo '<div class="alert alert-success" role="alert">Salvo com sucesso, atualize a pagina para visualizar a modificação!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar salvar. Contate o desenvolvedor do sistema</div>';
    }
    } else{

    }

    ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
        <form method="POST" action="salvarSobreMej.php" enctype="multipart/form-data">
            <fieldset class="input-margem">
                <label for="slogan">Sobre o MEJ:</label>
                <textarea class="form-control" name="slogan" id="box" rows="8" placeholder="texto..." required></textarea>
            </fieldset>
            </br>
            <fieldset class="input-margem">
               <section class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <button class="adm-btn btn btn-success" type="submit">Salvar</button>
                </section>
                <section class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <button type="button" class="adm-btn btn btn-danger" onclick="location.href='sair.php';">Cancelar</button>
                </section>
            </fieldset>
        </form>
    </div>    
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
        

    <!-- jQuery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </BODY>
</HTML>  