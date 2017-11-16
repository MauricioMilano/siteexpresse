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
if(isset($_POST["submit"]) && isset($_POST["imagem"])){
	$id_img = $_POST["imagem"];
	foreach ($db->query("SELECT nome, status FROM imagens WHERE imagens.id_img = '$id_img'") as $row){}
	$aux = $row['nome'];	
	$stat = $row['status'];
	$arquivo = "../../img/uploads/".$aux;
	if (!unlink($arquivo))
	{
	  echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar remover. Contate o desenvolvedor do sistema</div>';
	}
	else
	{
		$do = $db->query("DELETE FROM imagens WHERE imagens.nome = '$aux'");
	    if($stat=='ativo')
	    {
	    	
		    foreach ($db->query("SELECT id_img, nome, status FROM imagens WHERE imagens.fk_pag = 2 ORDER BY id_img ASC") as $row)
    		{
    			$db->query("UPDATE imagens SET status = '' WHERE imagens.fk_pag = 2");
	    	}
	    	$aux = $row['id_img'];
			$qry = $db->query("UPDATE imagens SET status = 'ativo' WHERE imagens.id_img = '$aux'");
    		
	    }
	    if ($do) {
            echo '<div class="alert alert-success" role="alert">Removido com sucesso, atualize a pagina para visualizar a modificação!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar remover. Contate o desenvolvedor do sistema</div>';
        }
	}
}

?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
    	<p><strong>Selecione a Imagem que deseja remover</strong></p>
	    <div class="row">
	    	<?php 
			foreach ($db->query("SELECT nome, status FROM imagens WHERE imagens.fk_pag = 2 ORDER BY id_img DESC") as $row){ ?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<p><?php echo $row['nome'];?></p>
						<img class="dl-img img-responsive img-thumbnail" src="../../img/uploads/<?php echo $row['nome'];?>">
					<p><?php echo $row['status'];?></p>
				</div>	
			<?php } ?>

		</div>	
			<form method="POST" action="deletarImagemSobre.php" enctype="multipart/form-data">
			    <fieldset>
			        <label for="nome">Imagem:</label>
			            <select name="imagem">
				            <?php 
			                    foreach ($db->query("SELECT id_img, nome FROM imagens WHERE imagens.fk_pag = 2 ORDER BY id_img DESC") as $row){ ?>
			                    <option value = "<?=$row["id_img"]?>" > <?=$row["nome"]?></option>
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