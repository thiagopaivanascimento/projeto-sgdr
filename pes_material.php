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
  <br>
    <div align="center">
	 <fieldset class="box">
      <br>
    <form action="pes_material.php" method="POST">
	 <table border="0" align="center">
      <tr>
       <td align="right">Informe o material: </td>
       <td align="left"><input type="text" name="txtMat" value="<?php echo $txtMat; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar">
	   </td>
       <td align="left"><input type="button" value="Voltar" class="botao"
       onclick="javascript:window.location.href='ger_material.php'"></td>
      </tr>
     </table>
	 </form>
      <br>
     </fieldset>
	 <p>
	 <?php
	  //Conex�o com o banco de dados
	  include 'conexao/conexao.php';
	
	
	$txtMat = $_POST["txtMat"];		
      $sql = "select * from materiais where material ilike '%$txtMat%' order by data";
	  $res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>N�o h� registro!</span>";
		   }else{
	  //Constru��o da consulta
       	echo "<table width='700' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='150' align='center'>MATERIAIS</td>"; 
		echo "<td class='topo_tabela' width='150' align='center'>PROFESSORES</td>";
		echo "<td class='topo_tabela' width='200' align='center'>DISCIPLINAS</td>";
		echo "<td class='topo_tabela' width='100' align='center'>CURSOS</td>";
		echo "<td class='topo_tabela' width='100' align='center'>DATAS</td>";
		echo "</tr>";
		 //Constru��o de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
		  $txtMat = pg_fetch_result($res, $i, "material");
		  $txtProf = pg_fetch_result($res, $i, "professor");
		  $txtDis = pg_fetch_result($res, $i, "disciplina");
		  $txtCurso = pg_fetch_result($res, $i, "curso");
		  $txtNasc  = pg_fetch_result($res, $i, "data");
		   //Exibir registros na tabela
		echo "<tr>";
		echo "<td class='detalhe_tabela' align='center'>$txtMat</td>";
		echo "<td class='detalhe_tabela' align='center'>$txtProf</td>";
		echo "<td class='detalhe_tabela' align='center'>$txtDis</td>";
		echo "<td class='detalhe_tabela' align='center'>$txtCurso</td>";
		echo "<td class='detalhe_tabela' align='center'>$txtNasc</td>";
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
 Copyright� SGDR - Sistema de Gerenciamento Did�tico Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>
</body>
</html>

