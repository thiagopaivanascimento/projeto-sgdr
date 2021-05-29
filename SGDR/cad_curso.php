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
   <img src="imagens/icone_curso.gif">
   <hr size="1">
    <br>
	<div align="center">
      <?php
	//Conex�o ao Banco de Dados
	include 'conexao/conexao.php';

	//Opera��o de Inclus�o
	$Incluir = $_POST["Incluir"];
	 if ($Incluir == 'Incluir'){
	
	$txtCurso = $_POST["txtCurso"];
	$semestre = $_POST["semestre"];
	$ch = $_POST["ch"];
	$turno = $_POST["turno"];
	
	if (empty($txtCurso)){
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($semestre)){ 
	echo "<script> alert('- Por favor, informe o SEMESTRE.') </script>";
	}	
	else if (empty($ch)){ 
	echo "<script> alert('- Por favor, informe a CARGA HOR�RIA.') </script>";
	}
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCurso) and !empty($semestre) and !empty($ch) and !empty($turno)){
	$sql = "SELECT * from cursos where curso = '$txtCurso'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Curso j� cadastrado.') </script>";
	   }else{
	     $sql = "INSERT into cursos (curso, semestre, carga_horaria, turno) values ('$txtCurso', '$semestre', '$ch', '$turno')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
             mkdir ("C:/Apache2.2/htdocs/SGDR/downloads/$txtCurso", 0700);
		   echo "<script> alert('Curso cadastrado com sucesso!') </script>";
		   echo "<script> alert('Foi criada uma SUBPASTA do curso na pasta de DOWNLOADS!') </script>";
		   echo "<script language='javascript'>window.location.href='pes_curso.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na grava��o das informa��es.') </script>";
		}	 
	  }
	}
   }
   
   //Opera��o de Pesquisa
   $Pesquisar = $_POST["Pesquisar"];	
    if($Pesquisar == 'Pesquisar'){
		$txtCurso = $_POST["txtCurso"];
  if (empty($txtCurso)){
   	echo "<script> alert('- O CURSO deve ser informado.') </script>";
	}
	 if( !empty($txtCurso)) {
  $sql = "SELECT * from cursos where curso='$txtCurso'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Curso n�o cadastrado.') </script>";
  }
  else {
    $txtCurso = pg_fetch_result($res,0,'curso');
    $semestre = pg_fetch_result($res,0,'semestre');
	$ch  = pg_fetch_result($res,0,'carga_horaria');
	$turno  = pg_fetch_result($res,0,'turno');
    }
  }
}

  //Opera��o de Altera��o
  $Alterar = $_POST['Alterar'];
if ($Alterar == 'Alterar') {
	$txtCurso = $_POST["txtCurso"];
	$semestre = $_POST["semestre"];
	$ch = $_POST["ch"];
	$turno = $_POST["turno"];
	
	if (empty($txtCurso)){
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($semestre)){ 
	echo "<script> alert('- Por favor, informe o SEMESTRE.') </script>";
	}	
	else if (empty($ch)){ 
	echo "<script> alert('- Por favor, informe a CARGA HOR�RIA.') </script>";
	}
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCurso) and !empty($semestre) and !empty($ch) and !empty($turno)){
$txtCurso = $_POST["txtCurso"];
$sql = "SELECT * from cursos where curso = '$txtCurso'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este curso n�o foi cadastrado!') </script>";
} else {
	$txtCurso = $_POST["txtCurso"];
	$semestre = $_POST["semestre"];
	$ch = $_POST["ch"];
	$turno = $_POST["turno"];
$sql = "UPDATE cursos set semestre='$semestre', carga_horaria='$ch' turno='$turno' where curso = '$txtCurso'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informa��es alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_curso.php'</script>";
} else {
echo "<script> alert('Houveram problemas na altera��o das informa��es') </script>";
				}
			}
		}
	}
// Opera��o de Exclus�o
$Excluir = $_POST['Excluir'];
if ($Excluir == 'Excluir') {
$txtCurso = $_POST["txtCurso"];
  if (empty($txtCurso)){
   	echo "<script> alert('- O CURSO deve ser informado.') </script>";
	}
	 if( !empty($txtCurso)) {
$txtCurso = $_POST['txtCurso'];
$sql = "SELECT * from cursos where curso = '$txtCurso'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este curso n�o foi cadastrado!') </script>";
} else {
$sql = "DELETE from cursos where curso = '$txtCurso'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Curso exclu�do com sucesso!') </script>";
} else {
echo "<script> alert('Houveram problemas na exclus�o das informa��es') </script>";
}
}
}
}

?>
	 <div align="right"><span class="aviso">(*) Campos Obrigat�rios</span></div>
	 <fieldset class="box">
      <legend class="titulo">Gerenciamento de disciplinas</legend>
      <p>
	  <form action="cad_curso.php" name="FormCurso" method="POST">
	  <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="text" name="txtCurso" value="<?php echo $txtCurso; ?>" size="30" maxlength="50">
	   <span class="aviso">*</span>&nbsp;
	   <input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	   </td>
      </tr>
	  <tr>
       <td align="right">Semestres:</td>
       <td align="left"><select name="semestre">
                        <option value="">Selecione os semestres</option>
                        <option value="4 Semestres">4 Semestres</option>
                        <option value="6 Semestres">6 Semestres</option>
                        <option value="8 Semestres">8 Semestres</option>
                        </select>
						<span class="aviso">*</span>
						</td>
      </tr>
	  <tr>
	   <td align="right">Carga Hor�ria:</td>
	   <td align="left"><select name="ch">
                        <option value="">Selecione a carga hor�ria</option>
                        <option value="1440 Horas">1440 Horas</option>
                        <option value="2160 Horas">2160 Horas</option>
						<option value="2880 Horas">2880 Horas</option>
                        </select>
						<span class="aviso">*</span>
						</td>
	   </tr>
	   <tr>				
	   <td align="right">Turno:</td>
       <td align="left"><select name="turno">
                        <option value="">Selecione o turno</option>
                        <option value="Manh� - 08:00 �s 12:00">Manh� - 08:00 �s 12:00</option>
                        <option value="Noite - 19:00 �s 22:00">Noite - 19:00 �s 22:00</option>
						<option value="Manh� e Noite">Manh� e Noite</option>
                        </select>
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
   <input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_curso.php'">&nbsp;
 </form>
 </div>
     <hr size="1">
 </div>
 <div id="rodape">
 Copyright� SGDR - Sistema de Gerenciamento Did�tico Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>

</body>
</html>

