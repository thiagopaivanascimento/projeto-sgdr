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
   <img src="imagens/icone_func.gif">
   <hr size="1">
   <br>
   <?php
	//Conexão ao Banco de Dados
	include 'conexao/conexao.php';

	//Operação de Inclusão
	$Incluir = isset($_POST["Incluir"]);
	 if ($Incluir == 'Incluir'){
	
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtProf = $_POST["txtProf"];
    $sexo = isset($_POST["sexo"]);
	$txtNasc = $_POST["txtNasc"];
	$civil = $_POST["civil"];
	$txtEnd = $_POST["txtEnd"];
	$txtBairro = $_POST["txtBairro"];
	$txtCEP = $_POST["txtCEP"];
	$txtCidade = $_POST["txtCidade"];
	$uf = isset($_POST["uf"]);
	$txtTel = $_POST["txtTel"];
	$txtCel = $_POST["txtCel"];
	$txtEmail = $_POST["txtEmail"];
	$txtDis = $_POST["txtDis"];
	$turno = $_POST["turno"];
	$txtCurso = $_POST["txtCurso"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];

	
	if (empty($txtCPF)){
	echo "<script> alert('- Por favor, informe o CPF.') </script>";
	}
	else if (empty($txtRG)){ 
	echo "<script> alert('- Por favor, informe a IDENTIDADE.') </script>";
	}	
	else if (empty($txtOrgExp)){ 
	echo "<script> alert('- Por favor, informe o ORGÃO EXPEDIDOR.') </script>";
	}
	else if (empty($txtProf)){ 
	echo "<script> alert('- Por favor, informe o PROFESSOR(A).') </script>";
	}	
	else if (empty($sexo)){ 
	echo "<script> alert('- Por favor, informe o SEXO.') </script>";
	}	
	else if (empty($txtNasc)){ 
	echo "<script> alert('- Por favor, informe a DATA de NASCIMENTO.') </script>";
	}	
	else if (empty($civil)){ 
	echo "<script> alert('- Por favor, informe o ESTADO CIVIL.') </script>";
	}	
	else if (empty($txtEnd)){ 
	echo "<script> alert('- Por favor, informe o ENDEREÇO.') </script>";
	}	
	else if (empty($txtBairro)){ 
	echo "<script> alert('- Por favor, informe o BAIRRO.') </script>";
	}	
	else if (empty($txtCEP)){ 
	echo "<script> alert('- Por favor, informe o CEP.') </script>";
	}	
	else if (empty($txtCidade)){ 
	echo "<script> alert('- Por favor, informe a CIDADE.') </script>";
	}	
	else if (empty($uf)){ 
	echo "<script> alert('- Por favor, informe a UF.') </script>";
	}	
	else if (empty($txtTel)){ 
	echo "<script> alert('- Por favor, informe o TELEFONE RESIDENCIAL.') </script>";
	}		
	else if (empty($txtEmail)){ 
	echo "<script> alert('- Por favor, informe o EMAIL.') </script>";
	}	
	else if (empty($txtDis)){ 
	echo "<script> alert('- Por favor, informe a DISCIPLINA a ser lecionada.') </script>";
	}	
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($login)){ 
	echo "<script> alert('- Por favor, informe o LOGIN.') </script>";
	}
	else if (empty($senha)){ 
	echo "<script> alert('- Por favor, informe a SENHA.') </script>";
	}
	else if (empty($nome)){ 
	echo "<script> alert('- Por favor, informe o NOME de USUÁRIO.') </script>";
	}	
	if (!empty($txtCPF) and !empty($txtRG) and !empty($txtOrgExp) and !empty($txtProf) and !empty($txtNasc)
	 and !empty($sexo) and !empty($civil) and !empty($txtEnd) and !empty($txtBairro) and !empty($txtCEP)
	 and !empty($txtCidade) and !empty($uf) and !empty($txtTel)	and !empty($txtEmail) 
	 and !empty($txtDis) and !empty($turno) and !empty($txtCurso)
	 and !empty($login) and !empty($senha) and !empty($nome)){
	$sql = "SELECT * from professores where cpf = '$txtCPF'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Professor já cadastrado.') </script>";
	   }else{
	     $sql = "INSERT into professores(cpf, rg, org_exp, professor, nascimento, sexo, civil, endereco, bairro, cep, cidade, uf, telefone, celular, email,  disciplina, turno, curso, login, senha, nome) values ('$txtCPF', '$txtRG', '$txtOrgExp', '$txtProf', '$txtNasc', '$sexo', '$civil', '$txtEnd', '$txtBairro', '$txtCEP', '$txtCidade', '$uf', '$txtTel', '$txtCel', '$txtEmail', '$txtDis', '$turno', '$txtCurso', '$login', '$senha', '$nome')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
		   mkdir ("C:/wamp64/www/projeto-sgdr/materiais/$txtProf", 0700);
		   echo "<script> alert('Professor cadastrado com sucesso!') </script>";
		   echo "<script> alert('Foi criada uma SUBPASTA do professor na pasta de MATERIAL!') </script>";
		   "<script language='javascript'>window.location.href='pes_func.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
		}	 
	  }
	}
   }
   
   //Operação de Pesquisa
   $Pesquisar = isset($_POST["Pesquisar"]);	
    if($Pesquisar == 'Pesquisar'){
		$txtCPF = $_POST["txtCPF"];
  if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	 if( !empty($txtCPF)) {
  $sql = "SELECT * from professores where cpf='$txtCPF'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Professor não cadastrado.') </script>";
  }
  else {
    $txtCPF = pg_fetch_result($res,0,'cpf');
	$txtRG = pg_fetch_result($res,0,'rg');
	$txtOrgExp = pg_fetch_result($res,0,'org_exp');
	$txtProf = pg_fetch_result($res,0,'professor');
	$txtNasc = pg_fetch_result($res,0,'nascimento');
	$txtsexo = pg_fetch_result($res,0,'sexo');
	$civil = pg_fetch_result($res,0,'civil');
	$txtEnd = pg_fetch_result($res,0,'endereco');
	$txtBairro = pg_fetch_result($res,0,'bairro');
	$txtCEP = pg_fetch_result($res,0,'cep');
	$txtCidade = pg_fetch_result($res,0,'cidade');
	$uf = pg_fetch_result($res,0,'uf');
	$txtTel = pg_fetch_result($res,0,'telefone');
	$txtCel = pg_fetch_result($res,0,'celular');
	$txtEmail = pg_fetch_result($res,0,'email');
	$txtDis = pg_fetch_result($res,0,'disciplina');
	$turno = pg_fetch_result($res,0,'turno');
	$txtCurso = pg_fetch_result($res,0,'curso');
	$login = pg_fetch_result($res,0,'login');
	$senha = pg_fetch_result($res,0,'senha');
	$nome = pg_fetch_result($res,0,'nome');
    
    }
  }
}

  //Operação de Alteração
  $Alterar = isset($_POST['Alterar']);
if ($Alterar == 'Alterar') {
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtProf = $_POST["txtProf"];
    $sexo = $_POST["sexo"];
	$txtNasc = $_POST["txtNasc"];
	$civil = $_POST["civil"];
	$txtEnd = $_POST["txtEnd"];
	$txtBairro = $_POST["txtBairro"];
	$txtCEP = $_POST["txtCEP"];
	$txtCidade = $_POST["txtCidade"];
	$uf = $_POST["uf"];
	$txtTel = $_POST["txtTel"];
	$txtCel = $_POST["txtCel"];
	$txtEmail = $_POST["txtEmail"];
	$txtDis = $_POST["txtDis"];
	$turno = $_POST["turno"];
	$txtCurso = $_POST["txtCurso"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	
	if (empty($txtCPF)){
	echo "<script> alert('- Por favor, informe o CPF.') </script>";
	}
	else if (empty($txtRG)){ 
	echo "<script> alert('- Por favor, informe a IDENTIDADE.') </script>";
	}	
	else if (empty($txtOrgExp)){ 
	echo "<script> alert('- Por favor, informe o ORGÃO EXPEDIDOR.') </script>";
	}
	else if (empty($txtProf)){ 
	echo "<script> alert('- Por favor, informe o PROFESSOR(A).') </script>";
	}	
	else if (empty($sexo)){ 
	echo "<script> alert('- Por favor, informe o SEXO.') </script>";
	}	
	else if (empty($txtNasc)){ 
	echo "<script> alert('- Por favor, informe a DATA de NASCIMENTO.') </script>";
	}	
	else if (empty($civil)){ 
	echo "<script> alert('- Por favor, informe o ESTADO CIVIL.') </script>";
	}	
	else if (empty($txtEnd)){ 
	echo "<script> alert('- Por favor, informe o ENDEREÇO.') </script>";
	}	
	else if (empty($txtBairro)){ 
	echo "<script> alert('- Por favor, informe o BAIRRO.') </script>";
	}	
	else if (empty($txtCEP)){ 
	echo "<script> alert('- Por favor, informe o CEP.') </script>";
	}	
	else if (empty($txtCidade)){ 
	echo "<script> alert('- Por favor, informe a CIDADE.') </script>";
	}	
	else if (empty($uf)){ 
	echo "<script> alert('- Por favor, informe a UF.') </script>";
	}	
	else if (empty($txtTel)){ 
	echo "<script> alert('- Por favor, informe o TELEFONE RESIDENCIAL.') </script>";
	}	
	else if (empty($txtEmail)){ 
	echo "<script> alert('- Por favor, informe o TELEFONE RESIDENCIAL.') </script>";
	}		
	else if (empty($txtDis)){ 
	echo "<script> alert('- Por favor, informe a DISCIPLINA a ser lecionada.') </script>";
	}	
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}
	else if (empty($login)){ 
	echo "<script> alert('- Por favor, informe o LOGIN.') </script>";
	}
	else if (empty($senha)){ 
	echo "<script> alert('- Por favor, informe a SENHA.') </script>";
	}
	else if (empty($nome)){ 
	echo "<script> alert('- Por favor, informe o NOME de USUÁRIO.') </script>";
	}	
	if (!empty($txtCPF) and !empty($txtRG) and !empty($txtOrgExp) and !empty($txtProf) and !empty($txtNasc)
	 and !empty($sexo) and !empty($civil) and !empty($txtEnd) and !empty($txtBairro) and !empty($txtCEP)
	 and !empty($txtCidade) and !empty($uf) and !empty($txtTel)	and !empty($txtEmail) 
	 and !empty($txtDis) and !empty($turno) and !empty($txtCurso)
	 and !empty($login) and !empty($senha) and !empty($nome)){

$txtCPF = $_POST["txtCPF"];
$sql = "SELECT * from professores where cpf = '$txtCPF'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
	 echo "<script> alert('Este professor não foi cadastrado!') </script>";
} else {
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtProf = $_POST["txtProf"];
    $sexo = $_POST["sexo"];
	$txtNasc = $_POST["txtNasc"];
	$civil = $_POST["civil"];
	$txtEnd = $_POST["txtEnd"];
	$txtBairro = $_POST["txtBairro"];
	$txtCEP = $_POST["txtCEP"];
	$txtCidade = $_POST["txtCidade"];
	$uf = $_POST["uf"];
	$txtTel = $_POST["txtTel"];
	$txtCel = $_POST["txtCel"];
	$txtEmail = $_POST["txtEmail"];
	$txtDis = $_POST["txtDis"];
	$turno = $_POST["turno"];
	$txtCurso = $_POST["txtCurso"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	
$sql = "UPDATE professroes set rg='$txtRG', org_exp='$txtOrgExp', professor='$txtProf', nascimento='$txtNasc', sexo='$sexo',
       civil='$civil', endereco='$txtEnd', bairro='$txtBairro', cep='$txtCEP', cidade='$txtCidade', uf='$uf', telefone='$txtTel',       celular='$txtCel', email='$txtEmail', disciplina='$txtDis', turno='$turno', curso='$txtCurso', login='$login', senha='$senha', nome='$nome' where cpf = '$txtCPF'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
"<script language='javascript'>window.location.href='pes_func.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
	
// Operação de Exclusão
$Excluir = isset($_POST['Excluir']);
if ($Excluir == 'Excluir') {
$txtCPF = $_POST["txtCPF"];
  if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	 if( !empty($txtCPF)) {
$txtCPF = $_POST['txtCPF'];
$sql = "SELECT * from professores where cpf = '$txtCPF'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este professor não foi cadastrado!') </script>";
} else {
$sql = "DELETE from professores where cpf = '$txtCPF'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Professor excluído com sucesso!') </script>";
"<script language='javascript'>window.location.href='pes_func.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}
?>
   <form action="cad_func.php" method="POST" name="FormProf" onSubmit="VerificaCPF();">
   <div align="right"><span class="aviso">(*) Campos Obrigatórios</span></div>
	<fieldset class="box_principal">
	  <legend class="titulo">Cadastramento - Professores</legend>   
	 <fieldset class="box_secundario">
      <legend class="titulo">Dados Pessoais</legend>
      <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">CPF:</td>
       <td align="left"><input type="text" name="txtCPF" value="<?php $txtCPF; ?>" size="15" maxlength="11">
					    <span class="aviso">*</span>&nbsp;
	   					<input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	   </td>
      </tr>
	  <tr>
       <td align="right">Identidade:</td>
       <td align="left"><input type="text" name="txtRG" value="<?php $txtRG; ?>" size="15" maxlength="10"/>
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
	   <td align="right">Org. Exp.:</td>
       <td align="left"><input type="text" name="txtOrgExp" value="<?php $txtOrgExp; ?>" size="15" maxlength="20"/>
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Professor(a):</td>
       <td align="left"><input type="text" name="txtProf" value="<?php $txtProf; ?>" maxlenght="80" size="30">
	   <span class="aviso">*</span>
	   </td>
       <td align="right">Sexo:</td>
       <td align="left"><input type="radio" name="sexo" value="Masculino" />Masculino &nbsp;
	                    <input type="radio" name="sexo" value="Feminino" />Feminino
						<span class="aviso">*</span>
						</td>
      </tr>
      <tr>
       <td align="right">Data de Nasc.:</td>
       <td align="left"><input type="text" name="txtNasc" value="<?php $txtNasc; ?>" size="15" maxlength="10" onKeyUp="mascara_txtNasc()" />
	   <span class="aviso">*</span>
	   </td>
       <td align="right">Estado Civil:</td>
       <td align="left"><select name="civil">
                        <option value="">Selecione o estado civil</option>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
						<option value="Viuvo(a)">Viúvo(a)</option>
                        </select>
						<span class="aviso">*</span>
						</td>
      </tr>
	  </table>
	</fieldset>
	<p>
	  <fieldset class="box_secundario">
      <legend class="titulo">Endereço</legend>
	  <table border="0" align="left" cellspading="2" cellspacing="2"> 
	  <tr>
       <td align="right">Endereço:</td>
       <td align="left"><input type="text" name="txtEnd" value="<?php $txtEnd; ?>" size="30" maxlength="60" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Bairro:</td>
       <td align="left"><input type="text" name="txtBairro" value="<?php $txtBairro; ?>" size="15" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
       <td align="right">Cidade:</tvd>
       <td align="left"><input type="text" name="txtCidade" value="<?php $txtCidade; ?>" size="30" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
       <tr>
	   <td align="right">CEP:</td>
       <td align="left"><input type="text" name="txtCEP" size="15" value="<?php $txtCEP; ?>" maxlength="9" onKeyUp="mascara_cep()" />
	   <span class="aviso">*</span>
	   </td>
       <td align="right">UF:</td>
       <td align="left"><select name="uf">
					<?php
					include 'conexao/conexao.php';
					$sql_est = "SELECT * from estados;";	
					$res = pg_query($sql_est);
				     for($i=0; $i<pg_num_rows($res); $i++){
					  $uf  = pg_fetch_result($res, $i,'uf');
					  $est = pg_fetch_result($res, $i,'estado');
					  $xuf = pg_fetch_result($res, $i,'uf');
						  if($uf == $xuf){
						   echo "<option value=\"$xuf\" selected>$uf</option>>";
  								}else{
								 echo "<option value=\"$xuf\"> $uf</option>>";
  									}
								}			
					?>
					</select>
					<span class="aviso">*</span>
		</td>			
	   </tr>
	  </table>
	  </fieldset>
     <p>
	 <fieldset class="box_secundario">
      <legend class="titulo">Contato</legend>
	  <table border="0" align="left" cellspading="2" cellspacing="2"> 
	  <tr>
       <td align="right">Tel. Residencial:</td>
       <td align="left"><input type="text" name="txtTel" value="<?php $txtTel; ?>" size="15" maxlength="12" onKeyUp="mascara_telefone()" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Tel. Celular:</td>
       <td align="left"><input type="text" name="txtCel" value="<?php $txtCel; ?>" size="15" maxlength="12" onKeyUp="mascara_celular()" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Email:</td>
       <td align="left"><input type="text" name="txtEmail" value="<?php $txtEmail; ?>" size="30" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
     </table>
	  </fieldset>
     <p>
	   <fieldset class="box_secundario">
      <legend class="titulo">Opções de Cargo</legend>
	  <table border="0" align="left" cellspading="2" cellspacing="2">
	  <tr> 
	   <td align="left">Escolha a disciplina a ser lecionada:</td>
	  <tr>
	  <tr>
	  <td align="left"><input type="text" name="txtDis" value="<?php $txtDis;?>" maxlenght="40" size="25">&nbsp;
	    <a href="#" onClick="window.open('../projeto-sgdr/popups/popupdisciplina.php', 'popupdisciplina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,        DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=400, HEIGHT=400');">
		<img src="imagens/icone_buscar.gif" alt="Procurar Disciplinas" border="0"></a>&nbsp;
		<span class="aviso">*</span>
	  </td>
	  <td>&nbsp;</td>				
	  </tr>
	  <tr>				
	  <td align="left">Curso:</td>
      </tr>
	  <tr>
	  <td align="left"><input type="text" name="txtCurso" value="<?php $txtCurso;?>" maxlenght="40" size="25">
	  <span class="aviso">*</span>&nbsp;
	  </td>
	  <tr>				
	  <td align="left">Turno:</td>
      </tr>
	  <tr>
	   <td align="left"><select name="turno">
                        <option value="">Selecione o turno</option>
                        <option value="Manhã - 08:00 às 12:00">Manhã - 08:00 às 12:00</option>
                        <option value="Noite - 19:00 às 22:00">Noite - 19:00 às 22:00</option>
                        </select>
						<span class="aviso">*</span>
						</td>
      </tr>
	  </table>
	 </fieldset>
	 <p>
	 <fieldset class="box_secundario">
      <legend class="titulo">Login - Usuário</legend>
	  <table border="0" align="left" cellspading="2" cellspacing="2">
       <tr>
       <td align="right">Login:</td>
       <td align="left"><input type="type" name="login" value="<?php $login; ?>" maxlength="10" size="20">
	   <span class="aviso">*</span>&nbsp;
	   </td>
	   </tr>
	   <tr>
       <td align="right">Senha:</td>
       <td align="left"><input type="password" name="senha" value="<?php $senha; ?>" maxlength="10" size="20">
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr> 
	  <td align="right">Nome:</td>
       <td align="left"><input type="type" name="nome" value="<?php $nome;?>" maxlength="20" size="20">
	   <span class="aviso">*</span>&nbsp;
	   </td>
      </tr>
	  </table>
	 </fieldset>
	 <p>
   </fieldset> 
   <p>
   <div align="center">
   <input type="button" value="Cancelar" class="botao" onClick="javascript:window.location.href='administracao.php'">&nbsp;
   <input type="SUBMIT" value="Incluir" class="botao" name="Incluir" onClick="VerificaCPF();">&nbsp;
   <input type="SUBMIT" value="Alterar" class="botao" name="Alterar" onClick="return confirm ('Deseja editar este PROFESSOR?')">&nbsp;
   <input type="SUBMIT" value="Excluir" class="botao" name="Excluir" onClick="return confirm ('Deseja excluir este PROFESSOR?')">&nbsp;
   <input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_func.php'">&nbsp;
 </form>
 </div>
	 <hr size="1">
 </div>
 <div id="rodape">
Copyright&copy; SGDR - Sistema de Gerenciamento Didáico Remoto. Todos os direitos reservados.
 </div>
</div>

</body>
</html>

