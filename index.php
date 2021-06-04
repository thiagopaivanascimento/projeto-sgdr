<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>::EETEP - Secretaria Virtual::</title>

	<!--Estilo CSS-->
	<link rel="stylesheet" type="text/css" href="css/estilo_principal.css" />
	<!--JavaScript-->
	<script type="text/javascript">
		function msg(){
		window.status = ":: SGDR - Sistema de Gerenciamneto Didático Remoto ::";
		return true;
		}
	</script>
</head>
<body bgcolor="#5299C5" onLoad="msg()">
<div align="center">
 <div id="tudo">
	<div id="menu">
	 <ul>
	  <li><a href="login_aluno.php" id="aluno">ALUNO</a></li>
      <li><a href="index.php" id="adm">ADMIN</a></li>
      <li><a href="login_prof.php" id="prof">PROFESSOR</a></li>
	 </ul>
   </div>
   <div id="topo">
   </div>
   <div id="conteudo">
   <img src="imagens/icone_autenticacao.gif" align="left">
   <br>
    <br>
	 <br>
	   <hr size="1">
	 <?php
    	$Entrar = isset($_POST['Entrar']);
   			if ($Entrar == 'Entrar') {
				$txtLogin = $_POST['txtLogin'];
				$txtSenha = $_POST['txtSenha'];
				//echo $txtLogin;
		include 'conexao/conexao.php';

		$sql = "SELECT * FROM usuarios WHERE login='$txtLogin'";
		$res = pg_query($sql);
		//var_dump($res);
				if (pg_num_rows($res) == 0) {
					echo "<script> alert('Usuário Inválido, tente novamente') </script>"; 
					}else{
						if ($txtSenha != pg_fetch_result($res, 0, "senha")){
							echo "<script> alert('Senha Inválida, tente novamente') </script>"; 
								}else{
								$txtLogin  = pg_fetch_result($res, 0, 'login');
								$txtSenha  = pg_fetch_result($res, 0, 'senha');
								$txtNome   = pg_fetch_result($res, 0, 'nome');
								session_name('sistema');
								session_start();
								$_SESSION["login_usuario"] = $txtLogin;
								$_SESSION["senha_usuario"] = $txtSenha;
								$_SESSION["nome_usuario"] = $txtNome;
								header ("Location: administracao.php");
						}
					}	
				}	

?>	   
   <form action="" method="POST" name"FormLogin">
  <table align="center" cellpadding="2" cellspacing="2" width="240">
   <tr>
	<td align="right">Login</td>
	<td align="left"><input type="text" name="txtLogin" value="<?php $txtLogin; ?>" size="15" maxlength="10"></td>
   </tr>
   <tr>
	<td align="right">Senha</td>
	<td align="left"><input type="password" name="txtSenha" value="<?php $txtSenha; ?>" size="15" maxlength="10"></td>
  </tr>
  </table>
   <br>
	<table>
	 <td colspan="3" align="center"><input type="submit" name="Entrar" value="Entrar" class="botao"></td>
	  </tr>
	 </table>
  </form>
   </div>
  </div>
     <div id="rodape">
	</div>
  </div>
  <br>
  <h3>SGDR - Sistema de Gerenciamento Didático Remoto</h3>	
 </body>
</html>
