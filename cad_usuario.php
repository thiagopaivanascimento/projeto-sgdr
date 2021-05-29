<?php
include 'config/valida.php';
include 'conexao/conexao.php';
?>
<html>
<head>
<title>::EETEP - Secretaria Virtual::</title>

<link rel="stylesheet" href="css/format.css" type="text/css" />
<link rel="stylesheet" href="css/link.css" type="text/css" />
<script type="text/javascript" src="scripts/menu.js"></script>

</head>
<body onLoad="horizontal();" vlink="white" alink="white">
 <div id="geral">
 <div id="topo">
</div>
<div id="nav">
<ul id="menu_dropdown" class="menubar">
        <li class="submenu"><a href="administracao.php"><img src="imagens/icone_home.gif" alt="P�gina Inicial">Home</a></li>
		<li class="submenu"><a href="#"><img src="imagens/icone_cli.gif" alt="Efetuar cadastros">Cadastro</a></li>
        <ul class="menu">
	    <li><a href="cad_aluno.php">Alunos</a></li>
        <li><a href="cad_func.php">Professores</a></li>
        <li><a href="cad_usuario.php">Usu�rios</a></li>
	   </ul>
   <li class="submenu"><a href="#"><img src="imagens/icone_ger.gif" alt="Gerenciamento">Gerenciamento</a>
      <ul class="menu">
	    <li><a href="cad_curso.php">Cursos</a></li>
		<li><a href="cad_disciplina.php">Disciplinas</a></li>
        <li><a href="ger_material.php">Material Did�ticos</a></li>
        <li><a href="ger_turma.php">Turmas</a></li>
      </ul>
   </li>
   <li class="submenu"><a href="downloads/"><img src="imagens/icone_pasta.gif" alt="Visualizar Material">Pasta</a></li>		
   <li class="submenu"><a href="#"><img src="imagens/icone_rel.gif" alt="Visualizar Relat�rios">Relat�rio</a>
      <ul class="menu">
        <li><a href="relatorios/rel_aluno.php">Alunos</a></li>
        <li><a href="relatorios/rel_func.php">Professores</a></li>
        <li><a href="relatorios/rel_curso.php">Cursos</a></li>
		<li><a href="relatorios/rel_disciplina.php">Disciplinas</a></li>
		<li><a href="relatorios/rel_material.php">Material Did�ticos</a></li>
        <li><a href="relatorios/rel_turma.php">Turmas</a></li>
		<li><a href="relatorios/rel_usuario.php">Usu�rios</a></li>
      </ul>
   </li>
    </li>
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Ajuda">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Usu�rio</a></li>
        </ul>
   <li class="submenu"><a href="logout.php" onClick="return confirm('Voc� deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
</ul>
 </div>
 <div id="conteudo">
   <img src="imagens/icone_usuario.gif">
   <hr size="1">
      <?php
include 'conexao/conexao.php';

//Opera��o de Pesquisa
$Pesquisar = $_POST['Pesquisar'];
if ( $Pesquisar == 'Pesquisar' ) {
  $txtLogin = $_POST['txtLogin'];
  if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	 if( !empty($txtLogin)) {
  $sql = "SELECT * from usuarios where login='$txtLogin'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) <= 0) {
     echo "<script> alert('Usu�rio n�o cadastrado') </script>";
  }
  else {
    $txtUsu = pg_fetch_result($res,0,'nome');
    $txtLogin  = pg_fetch_result($res,0,'login');
    $txtSenha = pg_fetch_result($res,0,'senha');
	}
 }
}

//Opera��o de Inclus�o
$incluir = $_POST['Incluir'];
if ($incluir == 'Incluir') {

$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USU�RIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
$sql = "SELECT * from usuarios where login='$txtLogin'";
$res = pg_query($conexao, $sql);
if (pg_num_rows($res) > 0 ) {
echo "<script> alert('Este Login j� foi cadastrado!') </script>";
} else {
$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
$sql = "insert into usuarios (nome, login, senha) values
('$txtUsu','$txtLogin','$txtSenha')";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Usu�rio cadastrado com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_usuario.php.'</script>";
} else {
echo "<script> alert('Houveram problemas na grava��o das informa��es.') </script>";
				}
			}
		}
	}
	
//Opera��o de Altera��o	
$alterar = $_POST['Alterar'];
if ($alterar == 'Alterar') {
$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USU�RIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
$txtLogin = $_POST['txtLogin'];
$sql = "select * from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este Login n�o foi cadastrada!') </script>";
} else {
$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
$sql = "UPDATE usuarios set nome='$txtUsu', senha='$txtSenha' where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informa��es alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_usuario.php'</script>";
} else {
echo "<script> alert('Houveram problemas na altera��o das informa��es') </script>";
				}
			}
		}
	}
// Opera��o de Exclus�o
$excluir = $_POST['Excluir'];
if ($excluir == 'Excluir') {
$txtlogin = $_POST['txtLogin'];
  if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	 if( !empty($txtLogin)) {
$txtlogin = $_GET['txtLogin'];
$sql = "select * from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este Usu�rio n�o foi cadastrado!') </script>";
} else {
$sql = "delete from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Usu�rio exclu�do com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_usuario.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclus�o das informa��es') </script>";
}
}
}
}
?>
	<br>
     <div align="center">
	  <fieldset class="box">
		    <legend class="titulo">Cadastramento de Usu�rios</legend>
			<form action="" method="POST" name="FormUsu">
			 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			<tr>
			<td align="right">Login:</td>
			<td align="left"><input type="text" size="15" name="txtLogin" value="<? echo $txtLogin; ?>" maxlength="10"></td>
			<td align="left"><input type="submit" name="Pesquisar" value="Pesquisar" class="botao"></td>
			</tr>
			<tr>
			<td align="right">Senha:</td>
			<td align="left"><input type="password" size="15" name="txtSenha" value="<? echo $txtSenha; ?>" maxlength="60"></td>
			</tr>
			<tr>
			<td align="right">Nome:</td>
            <td align="left"><input type="text" size="15" name="txtUsu" value="<? echo $txtUsu; ?>" maxlength="20"><td>			            </tr> 
			</tr>
			</table>
			 <p>
		</fieldset>
			<p>
			<table align="center" cellpadding="2" cellspacing="2" witdh="500">
			 <tr>
			  <td align="left"><input type="reset" value="Limpar" class="botao"></td>
			  <td align="left"><input type="submit" value="Incluir"  name="Incluir" class="botao" onClick="return confirm ('Deseja incluir este USU�RIO?')"></td>
			   <td align="left"><input type="submit" value="Alterar"  name="Alterar"  class="botao" onClick="return confirm ('Deseja editar este USU�RIO?')"></td>
			   <td align="left"><input type="submit" value="Excluir"  name="Excluir"  class="botao" onClick="return confirm ('Deseja excluir este USU�RIO?')"></td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar"  class="botao" onClick="javascript:window.location.href = 'pes_usuario.php'"></td>
			 </tr>
			</table>
			</form>
	   <hr size="1">
	</div> 
 </div>
 <div id="rodape">
 Copyright� SGDR - Sistema de Gerenciamento Did�tico Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>

</body>
</html>

