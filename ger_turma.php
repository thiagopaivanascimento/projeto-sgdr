<?php
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
   <img src="imagens/icone_turma.gif">
   <hr size="1">
    <br>
    <div align="center">
	<?php
	  include 'conexao/conexao.php';
	  
	  //Opera��o de Inclus�o
	$Incluir = $_POST["Incluir"];
	 if ($Incluir == 'Incluir'){
	
	$txtTurma = $_POST["txtTurma"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	$sala = $_POST["sala"];
	$vaga = $_POST["vaga"];
	
	if (empty($txtTurma)){
	echo "<script> alert('- Por favor, informe a DISCIPLINA.') </script>";
	}
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($sala)){ 
	echo "<script> alert('- Por favor, informe a SALA.') </script>";
	}
	else if (empty($vaga)){ 
	echo "<script> alert('- Por favor, informe a SALA.') </script>";
	}	
	if (!empty($txtTurma) and !empty($txtCurso) and !empty($turno) and !empty($sala) and !empty($vaga)){
	$sql = "SELECT * from turmas where turma = '$txtTurma'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Turma j� cadastrada.') </script>";
	   }else{
	   if ($vaga > 30){
		echo "<script> alert('Execedeu o n�mero de vagas') </script>";
		echo "<script> alert('Permitido at� 30 vagas') </script>";
		}else{
	     $sql = "INSERT into turmas (turma, curso, turno, sala, vaga) values ('$txtTurma', '$txtCurso', '$turno', '$sala', '$vaga')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
		   echo "<script> alert('Turma cadastrada com sucesso!') </script>";
		   echo "<script language='javascript'>window.location.href='pes_turma.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na grava��o das informa��es.') </script>";
		}	 
	  }
	}
   }
  } 
   //Opera��o de Pesquisa
   $Pesquisar = $_POST["Pesquisar"];	
    if($Pesquisar == 'Pesquisar'){
		$txtTurma = $_POST["txtTurma"];
  if (empty($txtTurma)){
   	echo "<script> alert('- A TURMA deve ser informada.') </script>";
	}
	 if( !empty($txtTurma)) {
  $sql = "SELECT * from turmas where turma='$txtTurma'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Turma n�o cadastrada.') </script>";
  }else {
    $txtTurma = pg_fetch_result($res,0,'turma');
    $txtCurso  = pg_fetch_result($res,0,'curso');
    $turno  = pg_fetch_result($res,0,'turno');
	$sala  = pg_fetch_result($res,0,'sala');
    $vaga  = pg_fetch_result($res,0,'vaga');
   
  }
 }
}
  //Opera��o de Altera��o
  $Alterar = $_POST['Alterar'];
if ($Alterar == 'Alterar') {
    $txtTurma = $_POST["txtTurma"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	$sala = $_POST["sala"];
	$vaga = $_POST["vaga"];
	
	if (empty($txtTurma)){
	echo "<script> alert('- Por favor, informe a DISCIPLINA.') </script>";
	}
	else if (empty($curso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($sala)){ 
	echo "<script> alert('- Por favor, informe a SALA.') </script>";
	}
	else if (empty($vaga)){ 
	echo "<script> alert('- Por favor, informe a SALA.') </script>";
	}
	if (!empty($txtTurma) and !empty($txtCurso) and !empty($turno) and !empty($sala) and !empty($vaga)){
	$txtTurma = $_POST["txtTurma"];
$sql = "SELECT * from turmas where turma = '$txtTurma'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta turma n�o foi cadastrada!') </script>";
} else {
    $txtTurma = $_POST["txtTurma"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	$sala = $_POST["sala"];
	$vaga = $_POST["vaga"];
	if ($vaga > 30){
	echo "<script> alert('Execedeu o n�mero de vagas') </script>";
	echo "<script> alert('Permitido at� 30 vagas') </script>";
	}	
	else{
$sql = "UPDATE turmas set curso='$txtCurso', turno='$turno', sala='$sala', vaga='$vaga' where turma = '$txtTurma'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informa��es alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_turma.php'</script>";
} else {
echo "<script> alert('Houveram problemas na altera��o das informa��es') </script>";
}
				}
			}
		}
	}
// Opera��o de Exclus�o
$Excluir = $_POST['Excluir'];
if ($Excluir == 'Excluir') {
$txtTurma = $_POST['txtTurma'];
  if (empty($txtTurma)){
   	echo "<script> alert('- A TURMA deve ser informada.') </script>";
	}
	 if( !empty($txtTurma)) {
$txtTurma = $_POST['txtTurma'];
$sql = "SELECT * from turmas where turma = '$txtTurma'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Esta TURMA n�o foi cadastrada!') </script>";
} else {
$sql = "DELETE from turmas where turma = '$txtTurma'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('TURMA exclu�da com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_turma.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclus�o das informa��es') </script>";
}
}
}
}

?>	
	
	  <div align="right"><span class="aviso">(*) Campos Obrigat�rios</span></div>
	  <fieldset class="box_secundario">
      <legend class="titulo">Gerenciamento de Turmas</legend>
      <p>
	  <form action="ger_turma.php" method="POST" name="FormTurma">
	  <table border="0" align="left">
      <tr>
       <td align="right">Turma:</td>
       <td align="left"><input type="text" name="txtTurma" value="<?php echo $txtTurma; ?>" maxlenght="20" size="25">
	                    <span class="aviso">*</span>&nbsp;
	                   <input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	   </td>
      </tr>
	  <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="text" name="txtCurso" value="<?php echo $txtCurso;?>" maxlenght="40" size="25">&nbsp;
	    <a href="#" onClick="window.open('../SGDR/popups/popupcurso.php', 'popupcurso', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=400, HEIGHT=400');">
		<img src="imagens/icone_buscar.gif" alt="Procurar Cursos" border="0"></a>&nbsp;
		<span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Turno:</td>
       <td align="left"><select name="turno">
                        <option value="">Selecione o turno</option>
                        <option value="Manh� - 08:00 �s 12:00">Manh� - 08:00 �s 12:00</option>
                        <option value="Noite - 19:00 �s 22:00">Noite - 19:00 �s 22:00</option>
                        </select>
						<span class="aviso">*</span>
						</td>
	  <td align="right">Sala:</td>
       <td align="left"><select name="sala">
                        <option value="">Selecione a sala</option>
                        <option value="Sala T01">Sala T01</option>
                         <option value="Sala T02">Sala T02</option>
						<option value="Sala T03">Sala T03</option>
                        </select>
						<span class="aviso">*</span>
						</td>
      				
      </tr>
	  <td align="right">Quantidade de<br> vagas:</td>
       <td align="left"><input type="text" name="vaga" value="<?php echo $vaga; ?>" maxlength="2" size="8">
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
   <input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_turma.php'">&nbsp;
 </form>
 </div>
     <hr size="1">
 </div>
 <div id="rodape">
 Copyright� SGDR - Sistema de Gerenciamento Did�tico Remoto. Todos os direitos reservados.
 </div>
</div>

</body>
</html>

