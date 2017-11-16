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
        if(isset($_POST['login']) && isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['user'])) 
        {
            $db = conecta_bd();
            $login = $_POST['login'];
            $senha = sha1($_POST['senha']);
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $id = $_POST['user'];

            $stmt = $db->prepare("SELECT senha FROM usuarios WHERE usuarios.senha = ? AND usuarios.email = ?"); 
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row)
            {
                echo 'usuário já cadastrado!';
            }
            else
            {
                $do = $db->prepare("UPDATE usuarios SET usuario = ?, senha = ?, nome = ?, email = ? WHERE usuarios.id_user = ?");
                $do->bindParam(1, $login, PDO::PARAM_STR);
                $do->bindParam(2, $senha, PDO::PARAM_STR);
                $do->bindParam(3, $nome, PDO::PARAM_STR);
                $do->bindParam(4, $email, PDO::PARAM_STR);
                $do->bindParam(5, $id, PDO::PARAM_INT);
                $do->execute();
                $row = $do->fetch(PDO::FETCH_ASSOC);
                if ($do) {
                    echo '<div class="alert alert-success" role="alert">Salvo com sucesso, atualize a pagina para visualizar a modificação!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Ocorreu um erro ao tentar salvar. Contate o desenvolvedor do sistema</div>';
                }
            }
            $db = NULL;
            
        }
    ?>

    </div>  
    <div class="col-lg-3 col-md-3 col-sm-2"></div>
    <div class="col-lg-6 col-md-6 col-sm-8">
        <form method="POST" action="editarUsuario.php" enctype="multipart/form-data">
            <label for="user">selecione o usuario:</label>
            <select name="user">
                <?php 
                    $db = conecta_bd();
                    foreach ($db->query("SELECT id_user, nome FROM usuarios") as $row){ ?>
                    <option value = "<?=$row["id_user"]?>" > <?=$row["nome"]?></option>
                <?php } ?>
            </select>
            <br>
            <div class="form-group">
                <label for="nome">Name</label>
                <input type="text" name="nome" class="form-control" id="exampleInputName" placeholder="Jane Doe" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="jane.doe@example.com" required>
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="exampleInputLogin" placeholder="jandie" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
            </div>
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