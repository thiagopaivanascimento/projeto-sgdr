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
   <li class="submenu"><a href="downloads/"><img src="imagens/icone_pasta.gif" alt="Visualizar Material">Pasta</a></li>		
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Ajuda">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Usuário</a></li>
        </ul>
   <li class="submenu"><a href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
</ul>
 </div>
 <div id="conteudo">
 <br>
  <table align="center" border="0" cellpadding="3" cellspacing="3" width="675">
   <tr>
    <td colspan="3" bgcolor="#006699" align="left" height="20" width="675">
	<span class="saudacao">Bem-vindo > <?php echo $_SESSION["nome_usuario"]; ?> > </span>
	<span class="saudacao"><?php include 'config/data.php'; ?> </span>
	</td>
	</tr> 
	<tr>
    <td  colspan="3" bgcolor="#5299C5" align="center" height="50" width="650">
	<span class="saudacao">
	Você está conectado ao Bano de Dados da<br>
	EETEP - Escola de Educação Teológia Pentecostal
	</span>
	</td>
	</tr> 
	<tr>
    <td align="left" height="405" width="225"><img src="imagens/anun_adm_cad.jpg"></td>
	<td align="left" height="405" width="225"><img src="imagens/anun_adm_ger.jpg"></td>
	<td align="left" height="405" width="225"><img src="imagens/anun_adm_rel.jpg"></td>
	</tr> 
  </table>
 </div>
<br>
 <div id="rodape">
  Copyright© SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
   </div>
 </div>
</div>
</body>
</html>

