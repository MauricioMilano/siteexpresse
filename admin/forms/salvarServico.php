<?php include "../../config.php"; ?>
<?php require("../accessCheck.php"); ?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">



    </HEAD>
    
    <BODY> 
    <div class="adm-alert col-lg-12 col-md-12">
    <?php
    if(isset($_POST['titulo'])) {
    $db = conecta_bd();
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $do = $db->exec("INSERT INTO topicos (fk_tipo, fk_pag, titulo, conteudo) VALUES (1, 3, '$titulo','$descricao')");

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
        <form method="POST" action="salvarServico.php" enctype="multipart/form-data">
            <fieldset class="input-margem">
                <label for="titulo">Título do serviço</label>
                <input type="text" name="titulo" class="form-control" placeholder="coloque aqui o título do serviço..." required>
            </fieldset>
            </br>
            <fieldset class="input-margem">
                <label for="descricao">Descrição geral do serviço</label>
                <input type="textarea" name="descricao" class="form-control" placeholder="coloque aqui uma descrição sobre o serviço..." required>
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