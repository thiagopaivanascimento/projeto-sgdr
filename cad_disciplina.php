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
   <img src="imagens/icone_disciplina.gif">
   <hr size="1">
    <br>
    <div align="center">
     <?php
	//Conexão ao Banco de Dados
	include 'conexao/conexao.php';

	//Operação de Inclusão
	$Incluir = isset($_POST["Incluir"]);
	 if ($Incluir == 'Incluir'){
	
	$txtDis = $_POST["txtDis"];
	$ch = $_POST["ch"];
	$txtCurso = $_POST["txtCurso"];
	
	if (empty($txtDis)){
	echo "<script> alert('- Por favor, informe a DISCIPLINA.') </script>";
	}
	else if (empty($ch)){ 
	echo "<script> alert('- Por favor, informe a CARGA HORÁRIA.') </script>";
	}
	else if ($txtCurso == ""){ 
	echo "<script> alert('- Por favor, informe a CURSO.') </script>";
	}	
	if (!empty($txtDis) and !empty($ch) and !empty($txtCurso)){
	$sql = "SELECT * from disciplinas where disciplina = '$txtDis'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Disciplina já cadastrada.') </script>";
	   }else{
	       $sql = "INSERT into disciplinas (disciplina, carga_horaria, curso) values ('$txtDis', '$ch', '$txtCurso')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
		   echo "<script> alert('Disciplina cadastrada com sucesso!') </script>";
		   echo "<script language='javascript'>window.location.href='pes_disciplina.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
		}	 
	  }
	}
   }
   
   //Operação de Pesquisa
   $Pesquisar = isset($_POST["Pesquisar"]);	
    if($Pesquisar == 'Pesquisar'){
		$txtDis = $_POST["txtDis"];
  if (empty($txtDis)){
   	echo "<script> alert('- A DISCIPLINA deve ser informada.') </script>";
	}
	 if( !empty($txtDis)) {
  $sql = "SELECT * from disciplinas where disciplina='$txtDis'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Disciplina não cadastrada.') </script>";
  }else {
    $txtDis = pg_fetch_result($res,0,'disciplina');
    $ch  = pg_fetch_result($res,0,'carga_horaria');
	$txtCurso  = pg_fetch_result($res,0,'curso');
    }
  }
}

  //Operação de Alteração
  $Alterar = isset($_POST['Alterar']);
if ($Alterar == 'Alterar') {
$txtDis = $_POST["txtDis"];
$ch = $_POST["ch"];
$txtCurso = $_POST["txtCurso"];
	if (empty($txtDis)){
   	echo "<script> alert('- A DISCIPLINA deve ser informada.') </script>";
	}
	else if (empty($ch)){
   	echo "<script> alert('- A CARGA HORÁRIA deve ser informada.') </script>";
	}
	else if (empty($txtCurso)){
   	echo "<script> alert('- O CURSO deve ser informado.') </script>";
	}
	if ( !empty($txtDis) and !empty($ch) and !empty($txtCurso)){
$txtDis = $_POST["txtDis"];
$sql = "SELECT * from disciplinas where disciplina = '$txtDis'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta disciplina não foi cadastrada!') </script>";
} else {
$txtDis = $_POST['txtDis'];
$ch = $_POST['ch'];
$sql = "UPDATE disciplinas set carga_horaria='$ch', curso='$txtCurso' where disciplina = '$txtDis'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_disciplina.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
// Operação de Exclusão
$Excluir = isset($_POST['Excluir']);
if ($Excluir == 'Excluir') {
$txtDis = $_POST['txtDis'];
  if (empty($txtDis)){
   	echo "<script> alert('- A DISCIPLINA deve ser informada.') </script>";
	}
	 if( !empty($txtDis)) {
$txtDis = $_POST['txtDis'];
$sql = "SELECT * from disciplinas where disciplina = '$txtDis'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta disciplina não foi cadastrada!') </script>";
} else {
$sql = "DELETE from disciplinas where disciplina = '$txtDis'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Disciplina excluída com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_disciplina.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}

?>
     <div align="right"><span class="aviso">(*) Campos Obrigatórios</span></div>
	 <fieldset class="box">
      <legend class="titulo">Gerenciamento de Disciplina</legend>
       <p>
     <form action="cad_disciplina.php" method="POST" name="FormDis">
      <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">Disciplina:</td>
       <td align="left"><input type="text" name="txtDis" value="<?php  $txtDis; ?>" maxlenght="40" size="50">
	   					<span class="aviso">*</span>&nbsp;
	   					<input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	   
	   </td>
      </tr>
      <tr>
       <td align="right">Carga Horária:</td>
       <td align="left"><input type="radio" name="ch" value="40 Hs/a">40 Hs/a&nbsp;<input type="radio" name="ch" value="80 Hs/a">80 Hs/a											       <span class="aviso">*</span>&nbsp;  
	   </td>
	   <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="type" name="txtCurso" value="<?php  $txtCurso;?>" maxlength="40" size="30">&nbsp;
	   <a href="#" onClick="window.open('../projeto-sgdr/popups/popupcurso.php', 'popupcurso', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=400, HEIGHT=400');">
		<img src="imagens/icone_buscar.gif" alt="Procurar Cursos" border="0"></a>&nbsp;
	   <span class="aviso">*</span>                 
	   </td>
      </tr>
      </table>
   <p>
  </fieldset>
</div>
  <p>
  <div align="center">
   <input type="button" value="Cancelar" class="botao" onClick="javascript:window.location.href='administracao.php'">&nbsp;
   <input type="SUBMIT" value="Incluir" class="botao" name="Incluir">&nbsp;
   <input type="SUBMIT" value="Alterar" class="botao" name="Alterar">&nbsp;
   <input type="SUBMIT" value="Excluir" class="botao" name="Excluir">&nbsp;
   <input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_disciplina.php'">&nbsp;
 </form>
   </div>
<hr size="1">
</div>
<div id="rodape">
 Copyright&copy; SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>
</body>
</html>

