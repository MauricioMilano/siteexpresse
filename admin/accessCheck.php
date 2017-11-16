<?php
   
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) 
    session_start();
     
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      //header("Location: http://localhost/expresse/admin/login.php"); exit;
      header("location: http://expresseconsultoria.com.br/admin/login.php"); exit;
  }
  
   
?>
