<html>
<head>
<title>::Procura Turmas::</title>

<link rel="stylesheet" href="../css/formatPopup.css" type="text/css" />
<script language="JavaScript">
function retornarPesquisa(turma, txtCurso, turno) {
	window.opener.document.forms[0].elements["turma"].value = turma;
	window.opener.document.forms[0].elements["txtCurso"].value = txtCurso;
	window.opener.document.forms[0].elements["turno"].value = turno;
	window.close();
}

</script>


</head>
<body>
    <div id="geral">
    <div align="center">
	 <fieldset class="box">
	  <form action="popupturma.php" method="POST" name="FormTurma">
	 <table border="0" align="center">
      <tr>
       <td align="right">Turma:</td>
       <td align="left"><input type="text" name="turma" value="<?php  $turma; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar"></td>
        </tr>
     </table>
	 </form>
     </fieldset>

	 <br>
	 <?php
	  //Conexão com o banco de dados
	  include '../conexao/conexao.php';
	
	
	$turma = isset($_POST["turma"]);
	$txtCurso = isset($_POST["txtCurso"]);
	$turno = isset($_POST["turno"]);
		
	  $sql = "SELECT * from turmas where turma like '%$turma%' order by turma";
	  $res = pg_query($conexao, $sql);  
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='300' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='200' align='center'>CURSOS</td>"; 
		echo "<td class='topo_tabela' width='200' align='center'>TURNOS</td>"; 
		echo "<td class='topo_tabela' width='200' align='center'>TURMAS</td>";
		echo "<td class='topo_tabela' width='200' align='center'>VAGAS</td>"; 
        echo "<td class='topo_tabela' width='100' align='center'>&nbsp;</td>";
		echo "</tr>";
		 //Constru��o de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
	     echo "<tr>";
  		  $txtCurso = pg_fetch_result($res, $i, "curso");
		  $turno = pg_fetch_result($res, $i, "turno");
		  $turma = pg_fetch_result($res, $i, "turma");
		  $vaga  = pg_fetch_result($res, $i, "vaga");
          $javascript = "javascript:retornarPesquisa(".$turma.", '".$txtCurso."', '".$turno."')";
		  //Exibir registros na tabela
		echo "<td class='detalhe_tabela' align='center'>$txtCurso</td>"; 
        echo "<td class='detalhe_tabela' align='center'>$turno</td>"; 
		echo "<td class='detalhe_tabela' align='center'>$turma</td>"; 
		echo "<td class='detalhe_tabela' align='center'>$vaga</td>";  
		echo "<td class='detalhe_tabela' align='center'>
			  <a href='javascript:retornarPesquisa(\"".$turma."\", \"".$txtCurso."\", \"".$turno."\")'>CARREGAR</a></td>";
		}		   
		
			echo "</tr>";
		}
	
		echo "</table>";
	  echo "<br>";
		 
	pg_close($conexao);
	
?>
</div>
 </body>
</html>

