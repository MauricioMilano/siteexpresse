<?php include "../../config.php"; ?>
<h1>Perdi a senha</h1>
<?php
  if( !empty($_POST) ){
    $db = conecta_bd();
 
    $user = $_POST['email'];
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bindParam(1, $user, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row){
      // o utilizador existe, vamos gerar um link único e enviá-lo para o e-mail
 
      // gerar a chave
      // exemplo adaptado de http://snipplr.com/view/20236/
      $chave = sha1(uniqid( mt_rand(), true));
 
      // guardar este par de valores na tabela para confirmar mais tarde
      $stmt = $db->prepare("INSERT INTO recuperacao VALUES (?, ?)");
	    $stmt->bindParam(1, $user, PDO::PARAM_STR);
      $stmt->bindParam(2, $chave, PDO::PARAM_STR);
      $run = $stmt->execute();
      if ($run){
 
      $link = "http://mybookmarker.16mb.com/admin/forms/recuperar.php?utilizador=$user&confirmacao=$chave";
      
      include 'class.phpmailer.php';
    

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "lipeflorentino2@gmail.com";
    $mail->Password = "condor1010";
    $mail->setFrom("lipeflorentino2@gmail.com", "Administrador");
    $mail->AddAddress($user, "lipeflorentino@yahoo.com");
    $mail->Subject = "recuperar senha";
    $mail->Body = "Olá, para recuperar sua senha acesse o link: ".$link;

    $envio = $mail->Send();
     
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
     
    // Exibe uma mensagem de resultado
    
      if($envio){
          echo "<script language='javascript' type='text/javascript'>alert('Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para recuperar a sua senha');window.location.href='../login.php';</script>";
          
 
        } else {
          echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro, por favor contate o desenvolvedor');window.location.href='../login.php';</script>";
 
        }
      } else {
        echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro, dados incorretos! Por favor contate o desenvolvedor');window.location.href='../login.php';</script>";
 
      }
    } else {
	  echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro, utilizador inexistente. Por favor contate o desenvolvedor');window.location.href='../login.php';</script>";
	}
  } else {
    // mostrar formulário de recuperação
?>
<form method="post">
  <label for="email">E-mail:</label>
  <input type="text" name="email" id="email" />
  <input type="submit" value="Recuperar" />
</form>
<?php
  }
?>