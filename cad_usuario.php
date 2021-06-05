<?php
    include 'conexao/conexao.php';
    include 'config/valida.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::EETEP - Secretaria Virtual::</title>
    <!--Estilo CSS -->
    <link rel="stylesheet" href="css/format.css" type="text/css" />
    <link rel="stylesheet" href="css/link.css" type="text/css" />
    <!-- Arquivo JavaScript -->
    <script type="text/javascript" src="scripts/menu.js"></script>
	<script type="text/javascript" src="scripts/scriptFormAluno.js"></script>
</head>

<body onLoad="horizontal();" vlink="white" alink="white"> 
 <div id="geral"> 
    <div id="topo">
          <!--IMG Topo - Arquivo CSS -->  
    </div>
    <div id="nav">
        <ul id="menu_dropdown" class="menubar">
            <li class="submenu">
                <a href="administracao.php"><img src="imagens/icone_home.gif" alt="Página Inicial">Home</a>
            </li>
            <li class="submenu">
                <a href="#"><img src="imagens/icone_cli.gif" alt="Efetuar cadastros">Cadastro</a>
                <ul class="menu">
                    <li><a href="cad_aluno.php">Alunos</a></li>
                    <li><a href="cad_func.php">Professores</a></li>
                    <li><a href="cad_usuario.php">Usuários</a></li>
                </ul>    
            </li> <!--/ li submenu-->
            <li class="submenu">
                <a href="#"><img src="imagens/icone_ger.gif" alt="Gerenciamento">Gerenciamento</a>
                <ul class="menu">
                    <li><a href="cad_curso.php">Cursos</a></li>
                    <li><a href="cad_disciplina.php">Disciplinas</a></li>
                    <li><a href="ger_material.php">Material Didáticos</a></li>
                    <li><a href="ger_turma.php">Turmas</a></li>
                </ul>
            </li><!--/ li submenu-->
            <li class="submenu">
                <a href="#"><img src="imagens/icone_rel.gif" alt="Visualizar Relatórios">Relatório</a>
                <ul class="menu">
                    <li><a href="relatorios/rel_aluno.php">Alunos</a></li>
                    <li><a href="relatorios/rel_func.php">Professores</a></li>
                    <li><a href="relatorios/rel_curso.php">Cursos</a></li>
                    <li><a href="relatorios/rel_disciplina.php">Disciplinas</a></li>
                    <li><a href="relatorios/rel_material.php">Material Didáticos</a></li>
                    <li><a href="relatorios/rel_turma.php">Turmas</a></li>
                    <li><a href="relatorios/rel_usuario.php">Usuários</a></li>
                </ul>
            </li><!--/ li submenu-->
           <li class="submenu">
               <a href="downloads/"><img src="imagens/icone_pasta.gif" alt="Visualizar Material">Pasta</a>
            </li><!--/ li submenu-->		
            <!--<li class="submenu">
                <a href="#"><img src="imagens/icone_ajuda.gif" alt="Ajuda">Ajuda</a>
                <ul class="menu">
                    <li><a href="manual.pdf">Manual do Usuário</a></li>
                </ul>
            </li>--><!--/ li submenu-->		    
            <li class="submenu">
                <a href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a>
            </li>
        </ul><!--/ul class menubar -->
    </div>
 <div id="conteudo">
   <img src="imagens/icone_usuario.gif">
   <hr size="1">
      <?php
include 'conexao/conexao.php';

//Operação de Pesquisa
$Pesquisar = isset($_POST['Pesquisar']);
if ($Pesquisar == 'Pesquisar') {
  	 $txtLogin = $_POST['txtLogin'];
  		if (empty($txtLogin)) {
   			echo "<script> alert('- O LOGIN deve ser informado.') </script>";
		} else if( !empty($txtLogin)) {
			$sql = "SELECT * FROM usuarios WHERE login='$txtLogin'";
			$res = pg_query($conexao, $sql);
		} else if (pg_num_rows($res) <= 0) {
     		echo "<script> alert('Usuário não cadastrado') </script>";
  		} else {
			$txtUsu    = pg_fetch_result($res,0,'nome');
			$txtLogin  = pg_fetch_result($res,0,'login');
			$txtSenha  = pg_fetch_result($res,0,'senha');
		}
 	}

//Operação de Inclusão
$incluir = isset($_POST['Incluir']);
if ($incluir == 'Incluir') {

$txtUsu = isset($_POST['txtUsu']);
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USUÁRIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
		$sql = "SELECT * from usuarios where login='$txtLogin'";
		$res = pg_query($conexao, $sql);
		if (pg_num_rows($res) > 0 ) {
		echo "<script> alert('Este Login já foi cadastrado!') </script>";
		} else {
		$txtUsu = $_POST['txtUsu'];
		$txtLogin = $_POST['txtLogin'];
		$txtSenha = $_POST['txtSenha'];
		$sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$txtUsu','$txtLogin','$txtSenha')";
		$res = pg_query($sql);
			if (pg_affected_rows($res)) {
				echo "<script> alert('Usuário cadastrado com sucesso!') </script>";
				"<script language='javascript'>window.location.href='pes_usuario.php.'</script>";
				} else {
				echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
						}
					}
				}
			}
	
//Operação de Alteração	
$alterar = isset($_POST['Alterar']);
if ($alterar == 'Alterar') {
$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
	if (empty($txtLogin)){
   	echo "<script> alert('- O LOGIN deve ser informado.') </script>";
	}
	else if (empty($txtUsu)){
   	echo "<script> alert('- O NOME do USUÁRIO deve ser informado.') </script>";
	}
	else if (empty($txtSenha)){
   	echo "<script> alert('- A SENHA deve ser informada.') </script>";
	}
	if ( !empty($txtUsu) and !empty($txtLogin) and !empty($txtSenha)){ 
$txtLogin = $_POST['txtLogin'];
$sql = "select * from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este Login não foi cadastrada!') </script>";
} else {
$txtUsu = $_POST['txtUsu'];
$txtLogin = $_POST['txtLogin'];
$txtSenha = $_POST['txtSenha'];
$sql = "UPDATE usuarios set nome='$txtUsu', senha='$txtSenha' where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
"<script language='javascript'>window.location.href='pes_usuario.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
// Operação de Exclusão
$excluir = isset($_POST['Excluir']);
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
echo "<script> alert('Este Usuário não foi cadastrado!') </script>";
} else {
$sql = "delete from usuarios where login = '$txtLogin'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Usuário excluído com sucesso!') </script>";
"<script language='javascript'>window.location.href='pes_usuario.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}
?>
	<br>
     <div align="center">
	  <fieldset class="box">
		    <legend class="titulo">Cadastramento de Usuários</legend>
			<form action="" method="POST" name="FormUsu">
			 <table align="center" cellpadding="2" cellspacing="2" witdh="500">
			<tr>
			<td align="right">Login:</td>
			<td align="left"><input type="text" size="15" name="txtLogin" value="<? $txtLogin; ?>" maxlength="10"></td>
			<td align="left"><input type="submit" name="Pesquisar" value="Pesquisar" class="botao"></td>
			</tr>
			<tr>
			<td align="right">Senha:</td>
			<td align="left"><input type="password" size="15" name="txtSenha" value="<? $txtSenha; ?>" maxlength="60"></td>
			</tr>
			<tr>
			<td align="right">Nome:</td>
            <td align="left"><input type="text" size="15" name="txtUsu" value="<? $txtUsu; ?>" maxlength="20"><td>			            </tr> 
			</tr>
			</table>
			 <p>
		</fieldset>
			<p>
			<table align="center" cellpadding="2" cellspacing="2" witdh="500">
			 <tr>
			  <td align="left"><input type="reset" value="Limpar" class="botao"></td>
			  <td align="left"><input type="submit" value="Incluir"  name="Incluir" class="botao" onClick="return confirm ('Deseja incluir este USUÁRIO?')"></td>
			   <td align="left"><input type="submit" value="Alterar"  name="Alterar"  class="botao" onClick="return confirm ('Deseja editar este USUÁRIO?')"></td>
			   <td align="left"><input type="submit" value="Excluir"  name="Excluir"  class="botao" onClick="return confirm ('Deseja excluir este USUÁRIO?')"></td>
			   <td align="left"><input type="button" value="Consultar"  name="Consultar"  class="botao" onClick="javascript:window.location.href = 'pes_usuario.php'"></td>
			 </tr>
			</table>
			</form>
	   <hr size="1">
	</div> 
 </div>
 <div id="rodape">
 Copyright&copy; SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>

</body>
</html>

