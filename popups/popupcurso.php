<?php
include '../conexao/conexao.php';
?>
<html>
<head>
<title>::Procurar Cursos::</title>

<link rel="stylesheet" href="../css/formatPopup.css" type="text/css" />
<script language="JavaScript">
function retornarPesquisa(txtCurso) {
	window.opener.document.forms[0].elements["txtCurso"].value = txtCurso;
	window.close();
}
</script>


</head>
<body>
   <div id="geral">
    <div align="center">
	 <fieldset class="box">
	  <form action="popupcurso.php" method="POST" name="FormCurso">
	 <table border="0" align="center">
      <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="text" name="txtCurso" value="<?php echo $txtCurso; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar"></td>
        </tr>
     </table>
	 </form>
     </fieldset>

	 <br>

	 <?php
	  //Conexão com o banco de dados
	  include '../conexao/conexao.php';
	
	
	$txtCurso = $_POST["txtCurso"];		
	  $sql = "select * from cursos where curso ilike '%$txtCurso%' order by curso";
	  $res = pg_query($conexao, $sql);  
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='300' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='200' align='center'>Cursos</td>"; 
		echo "<td class='topo_tabela' width='100' align='center'>&nbsp;</td>";
		echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
	     echo "<tr>";
		  $txtCurso = pg_fetch_result($res, $i, "curso");
		  $javascript = "javascript:retornarPesquisa(".$txtCurso.")";
		  		  //Exibir registros na tabela
		echo "<td class='detalhe_tabela' align='center'>$txtCurso</td>";  
		echo "<td class='detalhe_tabela' align='center'><a href='javascript:retornarPesquisa(\"".$txtCurso."\")'>CARREGAR</td>";
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

