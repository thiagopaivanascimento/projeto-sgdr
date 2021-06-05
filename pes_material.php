<?php
    include 'conexao/conexao.php';
    include 'config/valida_prof.php';
	$login = $_SESSION["nome_usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>::EETEP - Secretaria Virtual::</title>

<link rel="stylesheet" href="css/format_prof.css" type="text/css" />
<link rel="stylesheet" href="css/link_prof.css" type="text/css" />
<script type="text/javascript" src="scripts/menu.js"></script>

</head>
<body onLoad="horizontal();" vlink="white" alink="white"> 
 <div id="geral">
 <div id="topo">
 </div>
<div id="nav">
<ul id="menu_dropdown" class="menubar">
        <li class="submenu"><a href="adm_prof.php"><img src="imagens/icone_home.gif" alt="Página Inicial">Home</a></li>
		<li class="submenu"><a href="#"><img src="imagens/icone_cli.gif" alt="Retificação de dados cadastrais">Retificação</a></li>
        <li class="submenu"><a href="envio_material.php"><img src="imagens/icone_pasta.gif" alt="Enviar Material Didático">Enviar</a></li>
    </li>
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Manual">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Professor</a></li>
        </ul>
   <li class="submenu"><a href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
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
       <td align="right">Lista de materias Professor(a): <strong> <?php echo $login; ?> </strong>
	  </td>
       <!--<td align="left"><input type="text" name="txtMat" value="<?php  $txtMat; ?>" size="30" maxlength="60"></td>-->
       <!--<td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar">
	   </td>-->
		</tr>
		<tr>
       <td align="center"><input type="button" value="Voltar" class="botao"
       onclick="javascript:window.location.href='envio_material.php'"></td>
      </tr>
     </table>
	 </form>
      <br>
     </fieldset>
	 <p>
	 <?php
	  //Conexão com o banco de dados
	  include 'conexao/conexao.php';
	
      //$filtrar = isset($_POST['Filtrar']);
	  //if ($filtrar == 'Filtrar') {
	  //$txtMat = $_POST["txtMat"];		
      $sql = "SELECT * from materiais WHERE professor = '$login'";
	  $res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   } else {
	  //Construção da consulta
       	echo "<table width='700' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='150' align='center'>MATERIAIS</td>"; 
		echo "<td class='topo_tabela' width='150' align='center'>PROFESSORES</td>";
		echo "<td class='topo_tabela' width='200' align='center'>DISCIPLINAS</td>";
		echo "<td class='topo_tabela' width='100' align='center'>CURSOS</td>";
		echo "<td class='topo_tabela' width='100' align='center'>DATAS</td>";
		echo "</tr>";
		 //Construção de um loop
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
 Copyright&copy; SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
 </div>
</div>
</body>
</html>

