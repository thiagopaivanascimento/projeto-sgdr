<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>::EETEP - Secretaria Virtual::</title>

<style type="text/css">
<!--

body {
	font-size: 11px;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	margin: 100px auto; 
	padding: 0;
	text-align: center;
}

h3{
   color: #FFFFFF;
}

#tudo {
	/*background: #FFF; */
	width: 240px;
	margin: 0 auto;
	padding: 0px;
	text-align: left;
}

#topo{
	background-image: url(imagens/topo_secretaria_preta.jpg); 
	width: 240px;
	height: 30px;
	text-align: center;
}

hr {
	color: #000000;
	margin-left: 5px; 
	margin-right: 5px; 
}

#menu {
	height: 25px;
	margin-left: 15px; 
	padding-bottom: 8px;
	background-color: #333333;
	
}


#menu ul {
	margin: 0px auto;
	padding: 0px;
    margin-left: 0;
    margin-bottom: 10px;
}


#menu ul li {
	display: inline;
}


#menu ul li a {
    background-image: url(imagens/back_preta.gif); 
	color: #FFFFFF;
	font-weight: bold;
	float: left;
	padding: 9px 7px;
	margin: 0px;
	margin-left: 1px;
	text-decoration: none;
	font-size: 11px;
}


#menu ul li a:hover {
	color: #FFFFFF;
	text-decoration: underline;
}

#conteudo {
	margin-top: 1px;
	clear: both;
	font-size: 10px;
	text-align: center;
	width: 240px;
	height: auto;
	background-color: #FFFFFF;
}

.botao{
	width: 80px;
	height: 25px;
	background-image: url(imagens/color_botao_preta.jpg);
	color: white;
	font-size: 14px;
    font-weight: bold; 	 
	border: 1px solid #000000;
	text-decoration: none;
	margin-left: 75px;
	margin-bottom: 2px;
}

#rodape {
	background-image: url(imagens/back_preta.gif);
	height: 30px;
	text-align: center;
	width: 240px;
}

</style>

</head>
<body bgcolor="#333333">
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
   <img src="imagens/icone_autenticacao_preta.gif" align="left">
   <br>
    <br>
	 <br>
	   <hr size="1">
	<?php
		$Entrar = $_POST['Entrar'];
		if ($Entrar == 'Entrar') {
			$txtLogin = $_POST['txtLogin'];
			$txtSenha = $_POST['txtSenha'];

		include 'conexao/conexao.php';

			$sql = "SELECT login, senha, nome from professores where login='$txtLogin'";
			$res = pg_query($sql);
				if (pg_num_rows($res)==0) {
					echo "<script> alert('Usu�rio Inv�lido, tente novamente') </script>"; 
					}else{
						if ($txtSenha != pg_fetch_result($res, 0, "senha")){
							echo "<script> alert('Senha Inv�lida, tente novamente') </script>"; 
								}else{
								$txtLogin  = pg_fetch_result($res, 0, 'login');
								$txtSenha  = pg_fetch_result($res, 0, 'senha');
								$txtNome   = pg_fetch_result($res, 0, 'nome');
								session_name('sistema');
								session_start();
								$_SESSION["login_usuario"] = $txtLogin;
								$_SESSION["senha_usuario"] = $txtSenha;
								$_SESSION["nome_usuario"] = $txtNome;
								header ("Location: adm_prof.php");
						}
					}	
				}	

	?>	   
   <form action="" method="POST" name"FormLogin">
	<table align="center" cellpadding="2" cellspacing="2" width="240">
	<tr>
		<td align="right">Login</td>
		<td align="left"><input type="text" name="txtLogin" value="<?php echo $txtLogin; ?>" size="15" maxlength="10"></td>
	</tr>
	<tr>
		<td align="right">Senha</td>
		<td align="left"><input type="password" name="txtSenha" value="<?php echo $txtSenha; ?>" size="15" maxlength="10"></td>
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
