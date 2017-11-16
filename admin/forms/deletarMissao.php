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
if(isset($_POST["submit"]) && isset($_POST["missao"])){
	$id = $_POST["missao"];
	$do = $db->query("DELETE FROM textos WHERE textos.id_texto = '$id'");	
	if ($do) {
            echo '<div class="alert alert-success" role="alert">Removido com sucesso, atualize a pagina para visualizar a modificação!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar remover. Contate o desenvolvedor do sistema</div>';
        }
}

?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
    	<p><strong>Selecione o texto que deseja remover</strong></p>
	    <div class="row">
	    	<div class="table-responsive">
		    	<table class="table table-bordered">
			    	<thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Missao</th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php 
							foreach ($db->query("SELECT conteudo, id_texto FROM textos WHERE textos.fk_tipo = 7") as $row){ ?>
							<tr>
								<td>
									<p><?php echo $row['id_texto'];?></p>
								</td>
								<td>
									<p><?php echo $row['conteudo'];?></p>
								</td>	
							</tr>	
					    <?php } ?>
		            </tbody> 
				</table>
			</div>

		</div>	
			<form method="POST" action="deletarMissao.php" enctype="multipart/form-data">
			    <fieldset>
			        <label for="missao">selecione para apagar:</label>
			            <select name="missao">
				            <?php 
			                    foreach ($db->query("SELECT conteudo, id_texto FROM textos WHERE textos.fk_tipo = 7") as $row){ ?>
			                    <option value = "<?=$row["id_texto"]?>" > <?=$row["id_texto"]?></option>
				            <?php } ?>
			            </select>
			        	<br>
			        <button type="submit" name='submit' class="adm-btn btn btn-success">Confirmar</button>
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