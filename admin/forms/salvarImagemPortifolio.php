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
            include "Upload.class.php";
                    
            if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){
                $upload = new Upload($_FILES['foto'], 1500, 1200, "../../img/uploads/");
                $nomeImg = $upload->salvar();
                $desc = $_POST['descricao'];
                $tit = $_POST['titulo'];
                
                if(isset($nomeImg)){
                    $db = conecta_bd();
                    //tratar sql injection
                    $do = $db->exec("INSERT INTO imagens (fk_pag, nome, descricao, titulo) VALUES (4, '$nomeImg', '$desc', '$tit')");
                    if ($do) {
                    echo '<div class="alert alert-success" role="alert">Imagem salva com sucesso, atualize a pagina para visualizar a modificação!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar salvar a imagem. Contate o desenvolvedor do sistema</div>';
                    }
                } else{
                    echo '<div class="alert alert-danger" role="alert"> Erro, o tamanho ou a extensão do arquivo é inválido! Tipos aceitos (png, jpeg, gif, jpg), tamanho máximo permitido 1500 (largura) x 1200 (altura) .</div>';
                }
            } else{

            }
            
        ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
        <form method='post' enctype='multipart/form-data'>
            <div class="form-group center">
                <label for="exampleInputFile">Upload de arquivo</label>
                <input type="file" id="exampleInputFile" name='foto' value='Cadastrar foto' required>
                <p class="help-block">Selecione uma imagem para upload. (jpeg, png, gif, jpg)</p>
            </div>
            <label for="inputTitulo">Título</label>
            <input type="text" name = "titulo" class="form-control" placeholder="Insira um título..." required>
            <label for="inputDescricao">Descrição</label>
            <textarea class="form-control" name="descricao" rows="3" placeholder="Insira uma descrição..." required></textarea><br>
            <section class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <button class="adm-btn btn btn-success" type="submit" name='submit'>Salvar</button>
            </section>
            <section class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <button type="button" class="adm-btn btn btn-danger" onclick="location.href='sair.php';">Cancelar</button>
            </section>
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