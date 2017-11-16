<?php include "../../config.php"; ?>
<?php 
$db = conecta_bd();
if(isset($_POST['senha'])&&isset($_POST['email'])){
  $senha = sha1($_POST['senha']);     
  $user = $_POST['email'];     
  $do = $db->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
  $do->bindParam(1, $senha, PDO::PARAM_STR);
  $do->bindParam(2, $user, PDO::PARAM_STR);
  $do->execute();

  if ($do) {
    echo "<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='../login.php';</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro! Por favor contactar o desenvolvedor.');window.location.href='../login.php';</script>";
  }
}else{
  echo "<script language='javascript' type='text/javascript'>alert('Dados insuficientes!');window.location.href='../login.php';</script>";
}

?>  