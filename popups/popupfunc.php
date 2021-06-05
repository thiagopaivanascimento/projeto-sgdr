<html>
<head>
<title>::Procura Professores::</title>

<link rel="stylesheet" href="../css/formatPopup.css" type="text/css" />
<script language="JavaScript">
function retornarPesquisa(txtProf, txtDis, txtCurso) {
	window.opener.document.forms[0].elements["txtProf"].value = txtProf;
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
	  <form action="popupfunc.php" method="POST" name="FormProf">
	 <table border="0" align="center">
      <tr>
       <td align="right">Professor:</td>
       <td align="left"><input type="text" name="txtProf" value="<?php  $txtProf; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar"></td>
        </tr>
     </table>
	 </form>
     </fieldset>
	 <br>
	 <?php
	  //Conexão com o banco de dados
	  include '../conexao/conexao.php';
	
	
	$txtProf = isset($_POST["txtProf"]);		
	  $sql = "SELECT professor, disciplina, curso FROM professores WHERE professor LIKE '%$txtProf%' ORDER BY professor";
	  $res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='350' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='100' align='center'>PROFESSORES</td>"; 
		echo "<td class='topo_tabela' width='100' align='center'>DISCIPLINAS</td>"; 
		echo "<td class='topo_tabela' width='100' align='center'>CURSOS</td>"; 
		echo "<td class='topo_tabela' width='50' align='center'>&nbsp;</td>";
		echo "</tr>";
		 //Constru��o de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
	     echo "<tr>";
		  $txtProf = pg_fetch_result($res, $i, "professor");
	      $txtDis = pg_fetch_result($res, $i, "disciplina");
		  $txtCurso = pg_fetch_result($res, $i, "curso");	  
		  $javascript = "javascript:retornarPesquisa(".$txtProf.", '".$txtDis."', '".$txtCurso."')";
		  //Exibir registros na tabela
		echo "<td class='detalhe_tabela' align='center'>$txtProf</td>";  
		echo "<td class='detalhe_tabela' align='center'>$txtDis</td>";  
		echo "<td class='detalhe_tabela' align='center'>$txtCurso</td>";  
		echo "<td class='detalhe_tabela' align='center'>
		       <a href='javascript:retornarPesquisa(\"".$txtProf."\", \"".$txtDis."\", \"".$txtCurso."\")'>CARREGAR</a></td>";
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
  <div align="center"><br>
   <font color="white" face="calibri"><i>Copyright&copy; SGDR - Sistema de Gerenciamento Didático Remoto.
     Todos os direitos reservados.</i></font>
   </div>
 </div>
</div>
</body>
</html>

