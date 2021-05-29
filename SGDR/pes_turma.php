<?php
include 'conexao/conexao.php';
include 'config/valida.php';
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
        <li class="submenu"><a href="administracao.php"><img src="imagens/icone_home.gif" alt="Página Inicial">Home</a></li>
		<li class="submenu"><a href="#"><img src="imagens/icone_cli.gif" alt="Efetuar cadastros">Cadastro</a></li>
        <ul class="menu">
	    <li><a href="cad_aluno.php">Alunos</a></li>
        <li><a href="cad_func.php">Professores</a></li>
        <li><a href="cad_usuario.php">Usuários</a></li>
	   </ul>
   <li class="submenu"><a href="#"><img src="imagens/icone_ger.gif" alt="Gerenciamento">Gerenciamento</a>
      <ul class="menu">
	    <li><a href="cad_curso.php">Cursos</a></li>
		<li><a href="cad_disciplina.php">Disciplinas</a></li>
        <li><a href="ger_material.php">Material Didáticos</a></li>
        <li><a href="ger_turma.php">Turmas</a></li>
      </ul>
   </li>
   <li class="submenu"><a href="downloads/"><img src="imagens/icone_pasta.gif" alt="Visualizar Material">Pasta</a></li>		
   <li class="submenu"><a href="#"><img src="imagens/icone_rel.gif" alt="Visualizar Relatórios">Relatório</a>
      <ul class="menu">
        <li><a href="relatorios/rel_aluno.php">Alunos</a></li>
        <li><a href="relatorios/rel_func.php">Professores</a></li>
        <li><a href="relatorios/rel_curso.php">Cursos</a></li>
		<li><a href="relatorios/rel_disciplina.php">Disciplinas</a></li>
		<li><a href="relatorios/rel_material.php">Material Didáticos</a></li>
        <li><a href="relatorios/rel_turma.php">Turmas</a></li>
		<li><a href="relatorios/rel_usuario.php">Usuários</a></li>
      </ul>
   </li>
    </li>
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Ajuda">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Usuário</a></li>
        </ul>
   <li class="submenu"><a href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
</ul>
 </div>
 <div id="conteudo">
   <br>
    <div align="center">
	 <fieldset class="box">
      <br>
      <form action="pes_turma.php" name="FormTurma" method="POST">
	  <table border="0" align="center">
      <tr>
       <td align="right">Informe a turma:</td> 
       <td align="left"><input type="text" name="txtTurma" value="<?php echo $txtTurma;?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" name="Filtrar" value="Filtrar" class="botao"></td>
       <td align="left"><input type="button" value="Voltar" class="botao" onClick="javascript:window.location.href = 'ger_turma.php'"></td>
      </tr>
     </table>
	 </form>
      <br>
     </fieldset>
	 <p>
	 <?php
	  //Conexão com o banco de dados
	  include 'conexao/conexao.php';
	
	
	$txtTurma = $_POST["txtTurma"];		
      $sql = "select * from turmas where turma ilike '%$txtTurma%' order by turma";
	  $res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='700' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='100' align='center'>TURMAS</td>"; 
		echo "<td class='topo_tabela' width='250' align='center'>CURSOS</td>"; 
		echo "<td class='topo_tabela' width='250' align='center'>TURNOS</td>";
		echo "<td class='topo_tabela' width='50' align='center'>SALAS</td>";
		echo "<td class='topo_tabela' width='50' align='center'>VAGAS</td>";
		echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
		  $txtTurma = pg_fetch_result($res, $i, "turma");
		  $curso = pg_fetch_result($res, $i, "curso");
		  $turno = pg_fetch_result($res, $i, "turno");
		  $sala = pg_fetch_result($res, $i, "sala");
		  $vaga = pg_fetch_result($res, $i, "vaga");
		   //Exibir registros na tabela
		echo "<tr>";
		echo "<td class='detalhe_tabela' align='center'>$txtTurma</td>";
		echo "<td class='detalhe_tabela' align='center'>$curso</td>";
		echo "<td class='detalhe_tabela' align='center'>$turno</td>";
		echo "<td class='detalhe_tabela' align='center'>$sala</td>";
		echo "<td class='detalhe_tabela' align='center'>$vaga</td>";
		}		   
		
			echo "</tr>";
		}
	
		echo "</table>";
	  echo "<br>";
	  
	
	 
	pg_close($conexao);
	
?>
	</div>
 </div>

 <div id="rodape">
 Copyright© SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>

</body>
</html>

