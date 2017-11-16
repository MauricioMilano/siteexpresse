<?php include "../../config.php"; ?>
<h1>Alterar a senha</h1>
<?php
  $db = conecta_bd();
  //if( empty($_GET['utilizador']) || empty($_GET['confirmacao']) )
    //die('<p>Não é possível alterar a password: dados em falta</p>');
 
  $user = $_GET['utilizador'];
  $hash = $_GET['confirmacao'];
 
  $stmt = $db->prepare("SELECT COUNT(*) FROM recuperacao WHERE utilizador = ? AND confirmacao = ?");
  $stmt->bindParam(1, $user, PDO::PARAM_STR);
  $stmt->bindParam(2, $hash, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row)
  {
    // os dados estão corretos: eliminar o pedido e permitir alterar a password
    $stmt = $db->prepare("DELETE FROM recuperacao WHERE utilizador = ? AND confirmacao = ?");
    $stmt->bindParam(1, $hash, PDO::PARAM_STR);
    $stmt->bindParam(2, $user, PDO::PARAM_STR);
    $ok = $stmt->execute();
      
    echo '<form method="post" action="alterarSenha.php">
            <label for="senha">Nova senha</label>
            <input type="password" name="senha" id="senha" required/>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required/>
            <button class="adm-btn btn btn-success" type="submit">Salvar</button>
          </form>';
     
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Dados incorretos!');window.location.href='../login.php';</script>";
  }
 
?>