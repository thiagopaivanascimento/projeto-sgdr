<html>
 <head>
  <title>:: EETEP - Secretaria Virtual ::</title>
 </head>
 <body bgcolor="#003366"> 
<?php

session_name('sistema');
session_start();
if(($_SESSION["login_usuario"]))
 $loginbusca = $_SESSION["login_usuario"];
if(($_SESSION["senha_usuario"]))
 $senhabusca = $_SESSION["senha_usuario"];
if(($_SESSION["nome_usuario"]))
 $nomebusca = $_SESSION["nome_usuario"];


if(!(empty($loginbusca) and empty($senhabusca) and empty($nomebusca))){
  include "conexao/conexao.php";
  $sql = "Select login, senha, nome from alunos where login = '$loginbusca'";
  $res = pg_query($sql);
   if(pg_num_rows($res) == 1)
    {
	 if($senhabusca != pg_fetch_result($res, 0, "senha"))
	  {
	   unset ($_SESSION['login_usuario']);
	   unset ($_SESSION['senha_usuario']);
	   echo "<script> alert('Você não efetuou o LOGIN') </script>";
	   echo "<script language='javascript'>window.location.href = 'login_aluno.php'</script>";
	   exit;
	  } 
    }
	else
	{ 
	   unset ($_SESSION['login_usuario']);
	   unset ($_SESSION['senha_usuario']);
	   echo "<script> alert('Voc� n�o efetuou o LOGIN') </script>";
	   echo "<script language='javascript'>window.location.href = 'login_aluno.php'</script>";
	   exit;
	 }
	}
	else
	 {
	 echo "<script> alert('Voc� n�o efetuou o LOGIN') </script>";
	 echo "<script language='javascript'>window.location.href = 'login_aluno.php'</script>";
	 exit;
	}
  
 ?>
</body>
</html>