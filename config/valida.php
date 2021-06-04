<?php

session_name('sistema');
session_start();
	if(($_SESSION["login_usuario"]) != null) {
 		$loginbusca = $_SESSION["login_usuario"];
	}	 
	if(($_SESSION["senha_usuario"]) != null) {
 		$senhabusca = $_SESSION["senha_usuario"];
	}	 
	if(($_SESSION["nome_usuario"]) != null) {
 		$nomebusca = $_SESSION["nome_usuario"];
	}	 

	if(!(empty($loginbusca) and empty($senhabusca) and empty($nomebusca))){
  		include "conexao/conexao.php";
		$sql = "SELECT * FROM usuarios WHERE login = '$loginbusca'";
		$res = pg_query($sql);
		if(pg_num_rows($res) == 1) {
	 		if($senhabusca != pg_fetch_result($res, 0, "senha")) {
				unset ($_SESSION['login_usuario']);
				unset ($_SESSION['senha_usuario']);
				echo "<script> alert('Você não efetuou o LOGIN') </script>";
				echo "<script language='javascript'>window.location.href = 'index.php'</script>";
				exit;
	  		} 
    	} else { 
				unset ($_SESSION['login_usuario']);
				unset ($_SESSION['senha_usuario']);
				echo "<script> alert('Você não efetuou o LOGIN') </script>";
				echo "<script language='javascript'>window.location.href = 'index.php'</script>";
				exit;
	 	}
	} else {
				echo "<script> alert('Você não efetuou o LOGIN') </script>";
				echo "<script language='javascript'>window.location.href = 'index.php'</script>";
				exit;
	}
  
 ?>