<?php include "../../config.php"; ?>
<?php require("../accessCheck.php"); ?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/expresse.css" rel="stylesheet">
        <link href="assets/css/estiloHome.css" rel="stylesheet">


    </HEAD>
    
    <BODY> 
    <div class="adm-alert col-lg-12 col-md-12">
        <?php
        if(isset($_POST['user'])) 
        {
            $db = conecta_bd();
            $id = $_POST['user'];

            $stmt = $db->prepare("DELETE FROM usuarios WHERE usuarios.id_user = ?"); 
            $stmt->bindParam(1, $id, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt)
            {
                echo '<div class="alert alert-success" role="alert">Removido com sucesso, atualize a pagina para visualizar a modificação!</div>';
            }
            else
            {
                echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar remover. Contate o desenvolvedor do sistema</div>';
            }
            $db = NULL;
            
        }
    ?>

    </div>  
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
        <form method="POST" action="deletarUsuario.php" enctype="multipart/form-data">
            <label for="user">selecione o usuario:</label>
            <select name="user">
                <?php 
                    $db = conecta_bd();
                    foreach ($db->query("SELECT id_user, nome FROM usuarios") as $row){ ?>
                    <option value = "<?=$row["id_user"]?>" > <?=$row["nome"]?></option>
                <?php } ?>
            </select>
            <br>
            <button type="submit" name='submit' class="adm-btn btn btn-success">Confirmar</button>
            <button type="button" class="adm-btn btn btn-danger" onclick="location.href='sair.php';">Cancelar</button>
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