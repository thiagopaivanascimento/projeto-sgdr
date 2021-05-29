<?php
include 'conexao/conexao.php';
include 'config/valida_aluno.php';
?>
<html>
<head>
<title>::EETEP - Secretaria Virtual::</title>

<link rel="stylesheet" href="css/format_aluno.css" type="text/css" />
<link rel="stylesheet" href="css/link_aluno.css" type="text/css" />
<script type="text/javascript" src="scripts/menu.js"></script>

</head>

<body onLoad="horizontal();" vlink="white" alink="white"> 
 <div id="geral">
 <div id="topo">
 </div>
<div id="nav">
<ul id="menu_dropdown" class="menubar">
        <li class="submenu"><a href="adm_aluno.php"><img src="imagens/icone_home.gif" alt="P�gina Inicial">Home</a></li>
		<li class="submenu"><a href="#"><img src="imagens/icone_cli.gif" alt="Retifica��o de dados cadastrais">Retifica��o</a></li>
        <li class="submenu"><a href="#"><img src="imagens/icone_down.gif" alt="Downloads do Material Did�tico">Downloads</a></li>
        <li class="submenu"><a href="#"><img src="imagens/icone_rel.gif" alt="Visualizar Matriz Curricular">Matriz</a></li>
    </li>
   <li class="submenu"><a href="#"><img src="imagens/icone_ajuda.gif" alt="Manual">Ajuda</a></li>
     <ul class="menu">
         <li><a href="manual.pdf">Manual do Aluno</a></li>
        </ul>
   <li class="submenu"><a href="login_aluno.php" onClick="return confirm('Voc� deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a></li>
</ul>
 </div>
 <div id="conteudo">
 <br>
  <br>
  <table align="center" border="0" cellpadding="3" cellspacing="3" width="675">
   <tr>
    <td colspan="3" bgcolor="#999999" align="left" height="20" width="675">
	<span class="saudacao">Bem-vindo, aluno(a) > <?php echo $_SESSION["nome_usuario"]; ?> > </span>
	<span class="saudacao"><?php include 'config/data.php'; ?> </span>
	</td>
	</tr> 
	<tr>
    <td  colspan="3" bgcolor="#CCCCCC" align="center" height="50" width="675">
	<span class="saudacao">
	Voc� est� conectado ao Bano de Dados da<br>
	EETEP - Escola de Educa��o Teol�gia Pentecostal
	</span>
	</td>
	</tr> 
	<tr>
    <td align="left" height="400" width="225"><img src="imagens/anun_aluno_down.jpg"></td>
	<td align="left" height="400" width="225"><img src="imagens/anun_aluno_matriz.jpg"></td>
    <td align="left" height="400" width="225"><img src="imagens/anun_aluno_manual.jpg"></td>
	</tr> 
  </table>
 </div>
<br>
 <div id="rodape">
  Copyright� SGDR - Sistema de Gerenciamento Did�tico Remoto. Todos os direitos reservados.
   </div>
 </div>
</div>
</body>
</html>

