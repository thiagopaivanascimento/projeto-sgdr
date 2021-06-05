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
   <img src="imagens/icone_curso.gif">
   <hr size="1">
    <br>
	<div align="center">
      <?php
	//Conex�o ao Banco de Dados
	include 'conexao/conexao.php';

	//Operação de Inclusão
	$Incluir = isset($_POST["Incluir"]);
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
	 echo "<script> alert('- Por favor, informe a CARGA HORÁRIA.') </script>";
	}
	else if (empty($turno)){ 
	 echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCurso) and !empty($semestre) and !empty($ch) and !empty($turno)){
	$sql = "SELECT * from cursos where curso = '$txtCurso'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	   echo "<script> alert('Curso já cadastrado.') </script>";
	   } else {
	     $sql = "INSERT INTO cursos (curso, semestre, carga_horaria, turno) VALUES ('$txtCurso','$semestre','$ch','$turno')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
             mkdir ("C:/wamp64/www/projeto-sgdr/downloads/$txtCurso", 0700);
		    echo "<script> alert('Curso cadastrado com sucesso!') </script>";
		    echo "<script> alert('Foi criada uma SUBPASTA do curso na pasta de DOWNLOADS!') </script>";
		    "<script language='javascript'>window.location.href='pes_curso.php'</script>";
			}else{
			   echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
		}	 
	  }
	}
   }
   
   //Operação de Pesquisa
   $Pesquisar = isset($_POST["Pesquisar"]);	
    if($Pesquisar == 'Pesquisar'){
		$txtCurso = $_POST["txtCurso"];
  if (empty($txtCurso)){
   	 echo "<script> alert('- O CURSO deve ser informado.') </script>";
	}
	 if( !empty($txtCurso)) {
  $sql = "SELECT * from cursos where curso='$txtCurso'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
      echo "<script> alert('Curso não cadastrado.') </script>";
  }
  else {
    $txtCurso = pg_fetch_result($res,0,'curso');
    $semestre = pg_fetch_result($res,0,'semestre');
	$ch  = pg_fetch_result($res,0,'carga_horaria');
	$turno  = pg_fetch_result($res,0,'turno');
    }
  }
}

  //Operação de Alteração
  $Alterar = isset($_POST['Alterar']);
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
	 echo "<script> alert('- Por favor, informe a CARGA HORÁRIA.') </script>";
	}
	else if (empty($turno)){ 
	 echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCurso) and !empty($semestre) and !empty($ch) and !empty($turno)){
$txtCurso = $_POST["txtCurso"];
$sql = "SELECT * from cursos where curso = '$txtCurso'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
 echo "<script> alert('Este curso não foi cadastrado!') </script>";
} else {
	$txtCurso = $_POST["txtCurso"];
	$semestre = $_POST["semestre"];
	$ch = $_POST["ch"];
	$turno = $_POST["turno"];
$sql = "UPDATE cursos set semestre='$semestre', carga_horaria='$ch' turno='$turno' where curso = '$txtCurso'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
 echo "<script> alert('Informações alteradas com sucesso!') </script>";
 "<script language='javascript'>window.location.href='pes_curso.php'</script>";
} else {
 echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
// Operação de Exclusão
$Excluir = isset($_POST['Excluir']);
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
 echo "<script> alert('Este curso não foi cadastrado!') </script>";
} else {
$sql = "DELETE from cursos where curso = '$txtCurso'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
 echo "<script> alert('Curso excluído com sucesso!') </script>";
} else {
 echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}

?>
	 <div align="right"><span class="aviso">(*) Campos Obrigatórios</span></div>
	 <fieldset class="box">
      <legend class="titulo">Gerenciamento de disciplinas</legend>
      <p>
	  <form action="cad_curso.php" name="FormCurso" method="POST">
	  <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="text" name="txtCurso" value="<?php  $txtCurso; ?>" size="30" maxlength="50">
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
	   <td align="right">Carga Horária:</td>
	   <td align="left"><select name="ch">
                        <option value="">Selecione a carga horária</option>
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
                        <option value="Manhã - 08:00 às 12:00">Manhã - 08:00 às 12:00</option>
                        <option value="Noite - 19:00 às 22:00">Noite - 19:00 às 22:00</option>
						<option value="Manhã e Noite">Manhã e Noite</option>
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
 Copyright&copy; SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>

</body>
</html>

