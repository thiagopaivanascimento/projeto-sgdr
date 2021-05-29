<?php
include 'conexao/conexao.php';
include 'config/valida.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
   <hr size="1">
    <br>
    <?php

if (isset($arquivo)) // Verificamos se a variável "arquivo" existe
{
$nome = rand(00,9999); // Aqui criamos um número randômico, para utilizarmos como nome do arquivo
$dir="C:/Apache2.2/htdocs/SGDR/downloads/"; //Esse é o diretório onde ficará os arquivos enviados, lembre-se de criá-lo. Este script não cria diretórios

if (is_uploaded_file($arquivo)) // Verificamos se existe algum arquivo na variável "Arquivo"
{ move_uploaded_file($arquivo,$dir.$nome.$arquivo_name); // Aqui, efetuamos o upload, propriamente dito
 echo "<script> alert('Material Didático enviado com sucesso!') </script> "; // Caso dê tudo certo, imprimi na tela "enviado"
 echo "<script language='javascript'>window.location.href='envio_material.php'</script>";
}else{
 echo "<script> alert('Erro ao enviar!') </script> "; // Caso ocorra algum erro, imprimi na tela "erro"
}
}

?>

	 <div align="center">
	 <fieldset class="box_secundario">
      <legend class="titulo">Envio do Material Didático</legend>
      <p>
	  <form action="" method="POST" enctype="multipart/form-data" name="FormMat">
	  <table border="0" cellpadding="2" cellspacing="2" width="500">
	  <tr>
	  <td align="right">Material:</td>
	  <td align="left"><input type="file" name="arquivo"></td>
	  </tr>
	  </table>
	  <br>
	  </fieldset>
	  <p>
<input type="button" value="Cancelar" class="botao" onClick="javascript:window.location.href='administracao.php'">&nbsp;
<input type="SUBMIT" value="Enviar" class="botao" name="Enviar">&nbsp;
<input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_material.php'">&nbsp;
	  </form>
	  
     <p>
     <hr size="1">
 </div>
 </div>
  <div id="rodape">
  Copyright© SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
   </div>
 </div>
</div>

</body>
</html>

