<html>

<head>

<title>::EETEP - Secretaria Virtual::</title> 

<style type="text/css">
<!--

body {
	font-size: 11px;
	font-family: Trebuchet MS','Arial;
	margin: 100px; 
	padding: 0;
	text-align: center;
	}

h3{
   font-family: Trebuchet MS','Arial;
   color: #FFFFFF;
}

#tudo {
	background: #FFF; 
	width: 235px;
	margin: auto;
	padding: 0px;
	text-align: left;
}

#topo{
	background-image: url(imagens/topo_secretaria.jpg);
	width: 240px;
	height: 30px;
	text-align: center;
}

hr {
	color: #5299C5;
	margin-left: 5px; 
	margin-right: 5px; 
}

#menu {
	height: 27px;
	margin: 0; 
	padding: 0;
	background-color: #5299C5;
	width: 240px;
	}


#menu ul {
	margin: 0; 
	padding: 0;
	margin-left: 0;
	}


#menu ul li {
	display: inline;
	}


#menu ul li a {
    background-image: url(imagens/back.gif);
	color: #FFFFFF;
	font-weight: bold;
	float: left;
	padding: 9px 7px;
	margin: 1px;
	margin-left: 1px;
	text-decoration: none;
}


#menu ul li a:hover {
	color: #FFFFFF;
	text-decoration: underline;
}

#conteudo {
	margin-top: 10px;
	clear: both;
	font-size: 10px;
	text-align: center;
	font-family: Trebuchet MS','Arial;
	width: 240px;
}

.botao{
	width: 80px;
	height: 25px;
	background-image: url(imagens/color_botao.jpg);
	color: white;
	font:  Trebuchet MS','Arial;
	font-size: 14px;
    font-weight: bold; 	 
	border: 1px solid #5299C5;
	text-decoration: none;
}

#rodape {
	background-image: url(imagens/back.gif);
	height: 30px;
	text-align: center;
	width: 240px;
}
-->
</style>

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
      <li><a href="index.php" id="adm">ADMINISTRAÇÃO</a></li>
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
	$txtLogin = isset($_POST['txtLogin']);
	$txtSenha = isset($_POST['txtSenha']);

include 'conexao/conexao.php';

$sql = "SELECT * from usuarios where login='$txtLogin'";
$res = pg_query($sql);
	if (pg_num_rows($res)==0) {
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
	<td align="left"><input type="text" name="txtLogin" value="<?php echo isset($txtLogin); ?>" size="15" maxlength="10"></td>
   </tr>
   <tr>
	<td align="right">Senha</td>
	<td align="left"><input type="password" name="txtSenha" value="<?php echo isset($txtSenha); ?>" size="15" maxlength="10"></td>
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
