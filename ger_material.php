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
   <img src="imagens/icone_material.gif">
   <hr size="1">
    <br>
<?php
	//Conexão ao Banco de Dados
	include 'conexao/conexao.php';

	//Operação de Inclusão
	$Incluir = isset($_POST["Incluir"]);
	 if ($Incluir == 'Incluir'){
	
	$txtMat = $_POST["txtMat"];
	$txtProf = $_POST["txtProf"];
	$txtDis = $_POST["txtDis"];
	$txtCurso = $_POST["txtCurso"];
	$txtNasc = $_POST["txtNasc"];
	
	if (empty($txtMat)){
	echo "<script> alert('- Por favor, informe o MATERIAL DIDÁTICO.') </script>";
	}
	else if (empty($txtProf)){ 
	echo "<script> alert('- Por favor, informe o PROFESSOR.') </script>";
	}	
	else if (empty($txtDis)){ 
	echo "<script> alert('- Por favor, informe a DISCIPLINA.') </script>";
	}
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO).') </script>";
	}	
	else if (empty($txtNasc)){ 
	echo "<script> alert('- Por favor, informe a DATA.') </script>";
	}	
    if (!empty($txtMat) and !empty($txtProf) and !empty($txtDis) and !empty($txtCurso) and !empty($txtNasc)){
	$sql = "SELECT * from materiais where material = '$txtMat'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Material Didático já cadastrado.') </script>";
	   }else{
	     $sql = "INSERT into materiais(
			 material, disciplina, curso, data, professor) values (
				 '$txtMat', '$txtDis', '$txtCurso', '$txtNasc', '$txtProf')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
		   echo "<script> alert('Material Didático cadastrado com sucesso!') </script>";
		   echo "<script> alert('Agora, envie o material didático para downloads!') </script>";
		   echo "<script language='javascript'>window.location.href='envio_material.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
		}	 
	  }
	}
   }
   
   //Operação de Pesquisa
   $Pesquisar = isset($_POST["Pesquisar"]);	
    if($Pesquisar == 'Pesquisar'){
		$txtMat = $_POST["txtMat"];
  if (empty($txtMat)){
   	echo "<script> alert('- O MATERIAL DIDÁTICO deve ser informado.') </script>";
	}
	 if( !empty($txtMat)) {
  $sql = "SELECT * from materiais where material='$txtMat'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Material não cadastrado.') </script>";
  }
  else {
    $txtMat = pg_fetch_result($res, 0, "material");
	$txtNasc = pg_fetch_result($res, 0, "data");
	$txtCurso = pg_fetch_result($res, 0, "curso");
	$txtDis = pg_fetch_result($res, 0, "disciplina");
	$txtProf = pg_fetch_result($res, 0, "professor");
	
    }
  }
}
 
  
// Operação de Exclusão
$Excluir = isset($_POST['Excluir']);
if ($Excluir == 'Excluir') {
$txtMat = $_POST["txtMat"];
  if (empty($txtMat)){
   	echo "<script> alert('- O MATERIAL DIDÁTICO deve ser informado.') </script>";
	}
	 if( !empty($txtMat)) {
$txtMat = $_POST['txtMat'];
$sql = "SELECT * from materiais where material = '$txtMat'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este material não foi cadastrado!') </script>";
} else {
$sql = "DELETE from materiais where material = '$txtMat'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Material excluído com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_material.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}
?>
<?php

if (isset($arquivo)) // Verificamos se a variável "arquivo" existe
{
$nome = rand(00,9999); // Aqui criamos um número randômico, para utilizarmos como nome do arquivo
$dir="C:/wamp64/www/projeto-sgdr/downloads"; //Esse é o diretório onde ficará os arquivos enviados, lembre-se de criá-lo. Este script não cria diretórios

if (is_uploaded_file($arquivo)) // Verificamos se existe algum arquivo na variável "Arquivo"
{ move_uploaded_file($arquivo,$dir.$nome.$arquivo_name); // Aqui, efetuamos o upload, propriamente dito
 echo "<script> alert('Material Didático enviado com sucesso!') </script> "; // Caso dê tudo certo, imprimi na tela "enviado"
}else{
 echo "<script> alert('Erro ao enviar!') </script> "; // Caso ocorra algum erro, imprimi na tela "erro"
}
}

?>
     <div align="right"><span class="aviso">(*) Campos Obrigatórios</span></div>
	 <div align="center">
	 <fieldset class="box_secundario">
      <legend class="titulo">Gerenciamento de Material Didático</legend>
      <p>
	  <form action="ger_material.php" method="POST" name="FormProf">
	  <table border="0" cellpadding="2" cellspacing="2" width="500">
	  <tr>
	  <td align="right">Material Didático:</td>
	  <td align="left"><input type="text" name="txtMat" value="<?php $txtMat; ?>" size="30" maxlength="60">
	  					<span class="aviso">*</span>&nbsp;
	                   <input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Professor:</td>
	  <td align="left"><input type="text" name="txtProf" value="<?php $txtProf; ?>" size="30" maxlength="60">
 	  <a href="#" onClick="window.open('../projeto-sgdr/popups/popupfunc.php', 'popupfunc', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO,      RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=400, HEIGHT=400');">
	  <img src="imagens/icone_buscar.gif" alt="Procurar Professores" border="0"></a>&nbsp;
	  <span class="aviso">*</span>
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Disciplina:</td>
	  <td align="left"><input type="text" name="txtDis" value="<?php $txtDis; ?>" size="30" maxlength="60">
	  <span class="aviso">*</span>
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Curso:</td>
	  <td align="left"><input type="text" name="txtCurso" value="<?php $txtCurso; ?>" size="30" maxlength="60">
	  <span class="aviso">*</span>
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Data:</td>
	  <td align="left"><input type="text" name="txtNasc" value="<?php $txtNasc; ?>" size="15" maxlength="10" onKeyUp="mascara_txtNasc()">      <span class="aviso">*</span>
	  </td>
	  </tr>
	  </table>
	  <br>
	  </fieldset>
	  <p>
<input type="button" value="Cancelar" class="botao" onClick="javascript:window.location.href='administracao.php'">&nbsp;
<input type="SUBMIT" value="Incluir" class="botao" name="Incluir">&nbsp;
<input type="SUBMIT" value="Excluir" class="botao" name="Excluir">&nbsp;
<input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_material.php'">&nbsp;
	  </form>
	  
     <p>
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

