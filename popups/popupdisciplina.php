<?php
include '../conexao/conexao.php';
?>
<html>
<head>
<title>::Procura disciplinas::</title>

<link rel="stylesheet" href="../css/formatPopup.css" type="text/css" />
<script language="JavaScript">
function retornarPesquisa(txtDis, txtCurso) {
	window.opener.document.forms[0].elements["txtDis"].value = txtDis;
	window.opener.document.forms[0].elements["txtCurso"].value = txtCurso;
	window.close();
}
</script>


</head>
<body>
    <div id="geral">
    <div align="center">
	 <fieldset class="box">
	  <form action="popupdisciplina.php" method="POST" name="FormDisciplina">
	 <table border="0" align="center">
      <tr>
       <td align="right">Disciplina:</td>
       <td align="left"><input type="text" name="txtDis" value="<?php echo $txtDis; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar"></td>
        </tr>
     </table>
	 </form>
     </fieldset>

	 <br>
	 <?php
	  //Conexão com o banco de dados
	  include '../conexao/conexao.php';
	
	
	$txtDis = $_POST["txtDis"];		
	   $sql = "select disciplina, curso from disciplinas where disciplina ilike '%$txtDis%' order by disciplina";
	  $res = pg_query($conexao, $sql);  
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='400' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='200' align='center'>DISCIPLINAS</td>"; 
		echo "<td class='topo_tabela' width='100' align='center'>CURSOS</td>";
		echo "<td class='topo_tabela' width='100' align='center'>&nbsp;</td>";
		echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
	     echo "<tr>";
		  $txtDis = pg_fetch_result($res, $i, "disciplina");
		  $txtCurso = pg_fetch_result($res, $i, "curso");
    	  $javascript = "javascript:retornarPesquisa(".$txtDis.", '".$txtCurso."')";
		  		  //Exibir registros na tabela
		echo "<td class='detalhe_tabela' align='center'>$txtDis</td>";  
		echo "<td class='detalhe_tabela' align='center'>$txtCurso</td>";  
		echo "<td class='detalhe_tabela' align='center'>
		      <a href='javascript:retornarPesquisa(\"".$txtDis."\", \"".$txtCurso."\")'>CARREGAR</a></td>";
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

