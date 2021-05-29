<?php
include 'conexao/conexao.php';
include 'config/valida_prof.php';
?>
<html>
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
        <li class="submenu"><a href="#"><img src="imagens/icone_pasta.gif" alt="Enviar Material Didático">Enviar</a></li>
    </li>
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Manual">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Professor</a></li>
        </ul>
   <li class="submenu"><a href="login_prof.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
</ul>
 </div>
 <div id="conteudo">
 <br>
  <br>
  <table align="center" border="0" cellpadding="3" cellspacing="3" width="675">
   <tr>
    <td colspan="3" bgcolor="#000000" align="left" height="20" width="675">
	<span class="saudacao">Bem-vindo, professor(a) > <?php echo $_SESSION["nome_usuario"]; ?> > </span>
	<span class="saudacao"><?php include 'config/data.php'; ?> </span>
	</td>
	</tr> 
	<tr>
    <td  colspan="3" bgcolor="#333333" align="center" height="50" width="675">
	<span class="saudacao">
	Você está conectado ao Bano de Dados da<br>
	EETEP - Escola de Educação Teológia Pentecostal
	</span>
	</td>
	</tr> 
	<tr>
    <td align="left" height="400" width="225"><img src="imagens/anun_prof_material.jpg"></td>
	<td align="left" height="400" width="225"><img src="imagens/anun_prof_retif.jpg"></td>
    <td align="left" height="400" width="225"><img src="imagens/anun_prof_manual.jpg"></td>
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

