<?php
    include 'conexao/conexao.php';
    include 'config/valida.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::EETEP - Secretaria Virtual::</title>
    <!--Estilo CSS -->
    <link rel="stylesheet" href="css/format.css" type="text/css" />
    <link rel="stylesheet" href="css/link.css" type="text/css" />
    <!-- Arquivo JavaScript -->
    <script type="text/javascript" src="scripts/menu.js"></script>
	<script type="text/javascript" src="scripts/scriptFormAluno.js"></script>
</head>

<body onLoad="horizontal();" vlink="white" alink="white"> 
 <div id="geral"> 
    <div id="topo">
          <!--IMG Topo - Arquivo CSS -->  
    </div>
    <div id="nav">
        <ul id="menu_dropdown" class="menubar">
            <li class="submenu">
                <a href="administracao.php"><img src="imagens/icone_home.gif" alt="Página Inicial">Home</a>
            </li>
            <li class="submenu">
                <a href="#"><img src="imagens/icone_cli.gif" alt="Efetuar cadastros">Cadastro</a>
                <ul class="menu">
                    <li><a href="cad_aluno.php">Alunos</a></li>
                    <li><a href="cad_func.php">Professores</a></li>
                    <li><a href="cad_usuario.php">Usuários</a></li>
                </ul>    
            </li> <!--/ li submenu-->
            <li class="submenu">
                <a href="#"><img src="imagens/icone_ger.gif" alt="Gerenciamento">Gerenciamento</a>
                <ul class="menu">
                    <li><a href="cad_curso.php">Cursos</a></li>
                    <li><a href="cad_disciplina.php">Disciplinas</a></li>
                    <li><a href="ger_material.php">Material Didáticos</a></li>
                    <li><a href="ger_turma.php">Turmas</a></li>
                </ul>
            </li><!--/ li submenu-->
            <li class="submenu">
                <a href="#"><img src="imagens/icone_rel.gif" alt="Visualizar Relatórios">Relatório</a>
                <ul class="menu">
                    <li><a href="relatorios/rel_aluno.php">Alunos</a></li>
                    <li><a href="relatorios/rel_func.php">Professores</a></li>
                    <li><a href="relatorios/rel_curso.php">Cursos</a></li>
                    <li><a href="relatorios/rel_disciplina.php">Disciplinas</a></li>
                    <li><a href="relatorios/rel_material.php">Material Didáticos</a></li>
                    <li><a href="relatorios/rel_turma.php">Turmas</a></li>
                    <li><a href="relatorios/rel_usuario.php">Usuários</a></li>
                </ul>
            </li><!--/ li submenu-->
           <li class="submenu">
               <a href="downloads/"><img src="imagens/icone_pasta.gif" alt="Visualizar Material">Pasta</a>
            </li><!--/ li submenu-->		
            <!--<li class="submenu">
                <a href="#"><img src="imagens/icone_ajuda.gif" alt="Ajuda">Ajuda</a>
                <ul class="menu">
                    <li><a href="manual.pdf">Manual do Usuário</a></li>
                </ul>
            </li>--><!--/ li submenu-->		    
            <li class="submenu">
                <a href="logout.php" onClick="return confirm('Você deseja realmente sair?')"><img src="imagens/icone_sair.gif" alt="Logout">Sair</a>
            </li>
        </ul><!--/ul class menubar -->
    </div>
 <div id="conteudo">
  <br>
    <div align="center">
	 <fieldset class="box">
      <br>
    <form action="pes_disciplina.php" method="POST">
	 <table border="0" align="center">
      <tr>
       <td align="right">Informe a disciplina: </td>
       <td align="left"><input type="text" name="txtDis" value="<?php  $txtDis; ?>" size="30" maxlength="60"></td>
       <td align="right"><input type="submit" value="Filtrar" class="botao" name="Filtrar">
	   </td>
       <td align="left"><input type="button" value="Voltar" class="botao"
       onclick="javascript:window.location.href='cad_disciplina.php'"></td>
      </tr>
     </table>
	 </form>
      <br>
     </fieldset>
	 <p>
	 <?php
	  //Conexão com o banco de dados
	  include 'conexao/conexao.php';
	
	  $filtrar = isset($_POST['Filtrar']);
	  if ($filtrar == 'Filtrar') {
	$txtDis = $_POST["txtDis"];		
      $sql = "SELECT * FROM disciplinas WHERE disciplina LIKE '%$txtDis%' ORDER BY curso";
	  $res = pg_query($conexao, $sql); 
		if (pg_num_rows($res) == 0){
		  echo "<span class='mensagem'>Não há registro!</span>";
		   }else{
	  //Construção da consulta
       	echo "<table width='700' border='0' class='corpo_tabela' cellspadding='1' cellspacing='1' align='center'>";
		echo "<tr>";
		echo "<td class='topo_tabela' width='300' align='center'>DISCIPLINAS</td>"; 
		echo "<td class='topo_tabela' width='200' align='center'>CARGA HORÁRIA</td>";
		echo "<td class='topo_tabela' width='200' align='center'>CURSOS</td>";
		echo "</tr>";
		 //Construção de um loop
		 for ($i=0; $i < pg_num_rows($res); $i++ ) {
		  $txtDis = pg_fetch_result($res, $i, "disciplina");
		  $ch     = pg_fetch_result($res, $i, "carga_horaria");
		  $curso  = pg_fetch_result($res, $i, "curso");
		   //Exibir registros na tabela
		echo "<tr>";
		echo "<td class='detalhe_tabela' align='center'>$txtDis</td>";
		echo "<td class='detalhe_tabela' align='center'>$ch</td>";
		echo "<td class='detalhe_tabela' align='center'>$curso</td>";
		 }		   
		
			echo "</tr>";
		}
	
		echo "</table>";
	  echo "<br>";
	  
	
	}
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

