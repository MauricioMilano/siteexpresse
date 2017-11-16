<?php include "../../config.php"; ?>
<?php require("../accessCheck.php"); ?>

<!DOCTYPE HTML>
<HTML>
    <HEAD>
        
        <link href="assets/css/admin.css" rel="stylesheet">
        
        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        

    </HEAD>
    
    <BODY> 
    <div class="adm-alert col-lg-12 col-md-12">
<?php 


$db = conecta_bd(); 

?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
        <form method="POST" action="deletarCategoriaServico.php" enctype="multipart/form-data">
            <fieldset>
                <label for="servico">selecione o serviço:</label>
                    <select name="servico">
                        <?php 
                            foreach ($db->query("SELECT id_topico, titulo FROM topicos WHERE topicos.fk_tipo = 1") as $row){ ?>
                            <option value = "<?=$row["id_topico"]?>" > <?=$row["titulo"]?></option>
                        <?php } ?>
                    </select>
                    <br>
                <button type="submit" name='submit' class="adm-btn btn btn-success">Selecionar</button>
                <button type="button" class="adm-btn btn btn-danger" onclick="location.href='sair.php';">Cancelar</button>
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