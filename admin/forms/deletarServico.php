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
if(isset($_POST["submit"]) && isset($_POST["servico"])){
	$id = $_POST["servico"];
	$do = $db->query("DELETE FROM topicos WHERE topicos.id_topico = '$id'");	
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
    	<p><strong>Selecione o serviço que deseja remover</strong></p>
	    <div class="row">
	    	<div class="table-responsive">
		    	<table class="table table-bordered">
			    	<thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Serviço</th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php 
							foreach ($db->query("SELECT id_topico, titulo FROM topicos WHERE topicos.fk_tipo = 1") as $row){ ?>
							<tr>
								<td>
									<p><?php echo $row['id_topico'];?></p>
								</td>
								<td>
									<p><?php echo $row['titulo'];?></p>
								</td>	
							</tr>	
					    <?php } ?>
		            </tbody> 
				</table>
			</div>	
		</div>	
			<form method="POST" action="deletarServico.php" enctype="multipart/form-data">
			    <fieldset>
			        <label for="servico">selecione para apagar:</label>
			            <select name="servico">
				            <?php 
			                    foreach ($db->query("SELECT id_topico, titulo FROM topicos WHERE topicos.fk_tipo = 1") as $row){ ?>
			                    <option value = "<?=$row["id_topico"]?>" > <?=$row["id_topico"]?></option>
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