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
<script type="text/javascript" src="scripts/scriptFormAluno.js"></script>

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
   <img src="imagens/icone_aluno.gif">
   <hr size="1">
    <br>
    <?php
	//Conexão ao Banco de Dados
	include 'conexao/conexao.php';

	//Operação de Inclusão
	$Incluir = $_POST["Incluir"];
	 if ($Incluir == 'Incluir'){
	
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtAluno = $_POST["txtAluno"];
    $sexo = $_POST["sexo"];
	$txtNasc = $_POST["txtNasc"];
	$civil = $_POST["civil"];
	$txtNatural = $_POST["txtNatural"];
	$txtNacional = $_POST["txtNacional"];
	$txtEnd = $_POST["txtEnd"];
	$txtBairro = $_POST["txtBairro"];
	$txtCEP = $_POST["txtCEP"];
	$txtCidade = $_POST["txtCidade"];
	$uf = $_POST["uf"];
	$txtTel = $_POST["txtTel"];
	$txtCel = $_POST["txtCel"];
	$txtEmail = $_POST["txtEmail"];
	$txtEnsMed = $_POST["txtEnsMed"];
	$txtInst = $_POST["txtInst"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	
	if (empty($txtCPF)){
	echo "<script> alert('- Por favor, informe o CPF.') </script>";
	}
	else if (empty($txtRG)){ 
	echo "<script> alert('- Por favor, informe a Identidade.') </script>";
	}	
	else if (empty($txtOrgExp)){ 
	echo "<script> alert('- Por favor, informe o Orgão Expedidor.') </script>";
	}
	else if (empty($txtAluno)){ 
	echo "<script> alert('- Por favor, informe o ALUNO(A).') </script>";
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
	else if (empty($txtEnsMed)){ 
	echo "<script> alert('- Por favor, informe o ENSINO MÉDIO.') </script>";
	}	
	else if (empty($txtInst)){ 
	echo "<script> alert('- Por favor, informe a INSTITUIÇÃO.') </script>";
	}	
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}	
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($login)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($senha)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($nome)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCPF) and !empty($txtRG) and !empty($txtOrgExp) and !empty($txtAluno) and !empty($txtNasc)
	and !empty($sexo) and !empty($civil) and !empty($txtEnd) and !empty($txtBairro) and !empty($txtCEP) and !empty($txtCidade) and !empty(    $uf) and !empty($txtTel) and !empty($txtEnsMed) and !empty($txtInst) and !empty($txtEmail) and !empty($turno) and !empty($txtCurso)    and !empty($login) and !empty($senha) and !empty($nome)){
	$sql = "SELECT * from alunos where cpf = '$txtCPF' and login='$login'";
	$res = pg_query($sql); 
	 if (pg_num_rows($res)){
	  echo "<script> alert('Aluno já cadastrado.') </script>";
	   }else{
	     $sql = "INSERT into alunos(cpf, rg, org_exp, aluno, nascimento, sexo, civil, endereco, bairro, cep, cidade, uf, telefone, celular, email, ens_med, instituicao,  curso, turno, turma, login, senha, nome) values ('$txtCPF', '$txtRG', '$txtOrgExp', '$txtAluno', '$txtNasc', '$sexo', '$civil', '$txtEnd', '$txtBairro', '$txtCEP', '$txtCidade', '$uf', '$txtTel', '$txtCel', '$txtEmail', '$txtEnsMed', '$txtInst', '$txtCurso', '$turno', '$turma',  '$login', '$senha', '$nome')";
	     $res = pg_query($sql);
		  if(pg_affected_rows($res)){
		   echo "<script> alert('Aluno cadastrado com sucesso!') </script>";
		   echo "<script language='javascript'>window.location.href='pes_aluno.php'</script>";
			}else{
			  echo "<script> alert('Houveram problemas na gravação das informações.') </script>";
		}	 
	  }
	}
   }
   
   //Operação de Pesquisa
   $Pesquisar = $_POST["Pesquisar"];	
    if($Pesquisar == 'Pesquisar'){
		$txtCPF = $_POST["txtCPF"];
  if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	 if( !empty($txtCPF)) {
  $sql = "SELECT * from alunos where cpf='$txtCPF'";
  $res = pg_query($conexao, $sql);
  if (pg_num_rows($res) == 0) {
     echo "<script> alert('Aluno não cadastrado.') </script>";
  }
  else {
    $txtCPF = pg_fetch_result($res,0,'cpf');
	$txtRG = pg_fetch_result($res,0,'rg');
	$txtOrgExp = pg_fetch_result($res,0,'org_exp');
	$txtAluno = pg_fetch_result($res,0,'aluno');
	$txtNasc = pg_fetch_result($res,0,'nascimento');
	$sexo = pg_fetch_result($res, 0, 'sexo');
    $civil = pg_fetch_result($res,0,'civil');
	$txtEnd = pg_fetch_result($res,0,'endereco');
	$txtBairro = pg_fetch_result($res,0,'bairro');
	$txtCEP = pg_fetch_result($res,0,'cep');
	$txtCidade = pg_fetch_result($res,0,'cidade');
	$uf = pg_fetch_result($res,0,'uf');
	$txtTel = pg_fetch_result($res,0,'telefone');
	$txtCel = pg_fetch_result($res,0,'celular');
	$txtEmail = pg_fetch_result($res,0,'email');
	$txtEnsMed = pg_fetch_result($res,0,'ens_med');
	$txtInst = pg_fetch_result($res,0,'instituicao');
	$txtCurso = pg_fetch_result($res,0,'curso');
	$turno = pg_fetch_result($res,0,'turno');
	$turma = pg_fetch_result($res,0,'turma');
	$login = pg_fetch_result($res,0,'login');
	$senha = pg_fetch_result($res,0,'senha');
	$nome = pg_fetch_result($res,0,'nome');
    
    }
  }
}

  //Operação de Alteração
  $Alterar = $_POST['Alterar'];
if ($Alterar == 'Alterar') {
	
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtAluno = $_POST["txtAluno"];
    $sexo = $_POST["sexo"];
	$txtNasc = $_POST["txtNasc"];
	$civil = $_POST["civil"];
	$txtNatural = $_POST["txtNatural"];
	$txtNacional = $_POST["txtNacional"];
	$txtEnd = $_POST["txtEnd"];
	$txtBairro = $_POST["txtBairro"];
	$txtCEP = $_POST["txtCEP"];
	$txtCidade = $_POST["txtCidade"];
	$uf = $_POST["uf"];
	$txtTel = $_POST["txtTel"];
	$txtCel = $_POST["txtCel"];
	$txtEmail = $_POST["txtEmail"];
	$txtEnsMed = $_POST["txtEnsMed"];
	$txtInst = $_POST["txtInst"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$nome = $_POST["nome"];
	
	if (empty($txtCPF)){
	echo "<script> alert('- Por favor, informe o CPF.') </script>";
	}
	else if (empty($txtRG)){ 
	echo "<script> alert('- Por favor, informe a Identidade.') </script>";
	}	
	else if (empty($txtOrgExp)){ 
	echo "<script> alert('- Por favor, informe o Orgão Expedidor.') </script>";
	}
	else if (empty($txtAluno)){ 
	echo "<script> alert('- Por favor, informe o ALUNO(A).') </script>";
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
	else if (empty($txtEnsMed)){ 
	echo "<script> alert('- Por favor, informe o ENSINO MÉDIO.') </script>";
	}	
	else if (empty($txtInst)){ 
	echo "<script> alert('- Por favor, informe a INSTITUIÇÃO.') </script>";
	}	
	else if (empty($txtCurso)){ 
	echo "<script> alert('- Por favor, informe o CURSO.') </script>";
	}	
	else if (empty($turno)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($login)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($senha)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}
	else if (empty($nome)){ 
	echo "<script> alert('- Por favor, informe o TURNO.') </script>";
	}	
	if (!empty($txtCPF) and !empty($txtRG) and !empty($txtOrgExp) and !empty($txtAluno) and !empty($txtNasc)
	and !empty($sexo) and !empty($civil) and !empty($txtEnd) and !empty($txtBairro) and !empty($txtCEP) and !empty($txtCidade) and !empty(    $uf) and !empty($txtTel) and !empty($txtEnsMed) and !empty($txtInst) and !empty($txtEmail) and !empty($turno) and !empty($txtCurso)    and !empty($login) and !empty($senha) and !empty($nome)){
$txtCPF = $_POST["txtCPF"];
$sql = "SELECT * from alunos where cpf = '$txtCPF'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este aluno não foi cadastrado!') </script>";
} else {
	$txtCPF = $_POST["txtCPF"];
	$txtRG = $_POST["txtRG"];
	$txtOrgExp = $_POST["txtOrgExp"];
	$txtAluno = $_POST["txtAluno"];
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
	$txtEnsMed = $_POST["txtEnsMed"];
	$txtInst = $_POST["txtInst"];
	$txtCurso = $_POST["txtCurso"];
	$turno = $_POST["turno"];
	
$sql = "UPDATE alunos set rg='$txtRG', org_exp='$txtOrgExp', aluno='$txtAluno', nascimento='$txtNasc', sexo='$sexo',
       civil='$civil', endereco='$txtEnd', bairro='$txtBairro', cep='$txtCEP', cidade='$txtCidade', uf='$uf', telefone='$txtTel',       celular='$txtCel', email='$txtEmail', ens_med='$txtEnsMed', instituicao='$txtInst', curso='$txtCurso', turno='$turno',
	   login='$login', senha='$senha', nome='$nome'  
	   where cpf = '$txtCPF'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Informações alteradas com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_aluno.php'</script>";
} else {
echo "<script> alert('Houveram problemas na alteração das informações') </script>";
				}
			}
		}
	}
	
// Operação de Exclusão
$Excluir = $_POST['Excluir'];
if ($Excluir == 'Excluir') {
$txtCPF = $_POST["txtCPF"];
  if (empty($txtCPF)){
   	echo "<script> alert('- O CPF deve ser informado.') </script>";
	}
	 if( !empty($txtCPF)) {
$txtCPF = $_POST['txtCPF'];
$sql = "SELECT * from alunos where cpf = '$txtCPF'";
$res = pg_query($sql);
if ( pg_num_rows($res) <= 0 ) {
echo "<script> alert('Este aluno não foi cadastrado!') </script>";
} else {
$sql = "DELETE from alunos where cpf = '$txtCPF'";
$res = pg_query($sql);
if (pg_affected_rows($res)) {
echo "<script> alert('Aluno excluído com sucesso!') </script>";
echo "<script language='javascript'>window.location.href='pes_aluno.php'</script>";
} else {
echo "<script> alert('Houveram problemas na exclusão das informações') </script>";
}
}
}
}
?>
	
	<form action="cad_aluno.php" method="POST" name="FormAluno" onSubmit="VerificaCPF();">
	<div align="right"><span class="aviso">(*) Campos Obrigatórios</span></div>
	<fieldset class="box_principal">
	  <legend class="titulo">Cadastramento - Alunos</legend>   
	 <fieldset class="box_secundario">
      <legend class="titulo">Dados Pessoais</legend>
      <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">CPF:</td>
       <td align="left"><input type="text" name="txtCPF" value="<?php echo $txtCPF; ?>" size="15" maxlength="11">&nbsp;
	   					<span class="aviso">*</span>
	   					<input type="submit" name="Pesquisar" value="Pesquisar" class="botao">
	   </td>
      </tr>
	  <tr>
       <td align="right">Identidade:</td>
       <td align="left"><input type="text" name="txtRG" value="<?php echo $txtRG; ?>" size="15" maxlength="10"/><span class="aviso">*</span></td>
       <td align="right">Org. Exp.:</td>
       <td align="left"><input type="text" name="txtOrgExp" value="<?php echo $txtOrgExp; ?>" size="15" maxlength="20"/><span class="aviso">*</span></td>
      </tr>
	  <tr>
       <td align="right">Aluno(a):</td>
       <td align="left"><input type="text" name="txtAluno" value="<?php echo $txtAluno; ?>" maxlenght="80" size="30"><span class="aviso">*</span></td>
       <td align="right">Sexo:</td>
       <td align="left"><input type="radio" name="sexo" value="M" />Masculino &nbsp;
	                    <input type="radio" name="sexo" value="F" />Feminino
						<span class="aviso">*</span>
							</td>
      </tr>
      <tr>
       <td align="right">Data de Nasc.:</td>
       <td align="left"><input type="text" name="txtNasc" value="<?php echo $txtNasc; ?>" size="15" maxlength="10" onKeyUp="mascara_txtNasc()" /><span class="aviso">*</span></td>
       <td align="right">Estado Civil:</td>
       <td align="left"><select name="civil" id="civil">
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
       <td align="left"><input type="text" name="txtEnd" value="<?php echo $txtEnd; ?>" size="30" maxlength="60" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Bairro:</td>
       <td align="left"><input type="text" name="txtBairro" value="<?php echo $txtBairro; ?>" size="15" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
       <td align="right">Cidade:</td>
       <td align="left"><input type="text" name="txtCidade" value="<?php echo $txtCidade; ?>" size="30" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
       <tr>
	   <td align="right">CEP:</td>
       <td align="left"><input type="text" name="txtCEP" size="15" value="<?php echo $txtCEP; ?>" maxlength="9" onKeyUp="mascara_cep()" />       <span class="aviso">*</span>
	   </td>
       <td align="right">UF:</td>
       <td align="left"><select name="uf">
					<?php
					include 'conexao/conexao.php';
					$sql_est = "select * from estados order by estado;";	
					$res = pg_query($sql_est);
				     for($i=0; $i<pg_num_rows($res); $i++){
					  $uf  = pg_fetch_result($res, $i,'uf');
					  $est = pg_fetch_result($res, $i,'estado');
					  $xuf = pg_fetch_result($res, $i,'uf');
						  if($uf == $xuf){
						    echo "<option value=\"$xuf\" selected>$uf</option>>";
  								}else{
								    echo "<option value=\"$xuf\"> $uf </option>>";
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
       <td align="left"><input type="text" name="txtTel" value="<?php echo $txtTel; ?>" size="15" maxlength="12" onKeyUp="mascara_telefone()" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Tel. Celular:</td>
       <td align="left"><input type="text" name="txtCel" value="<?php echo $txtCel; ?>" size="15" maxlength="12" onKeyUp="mascara_celular()" />
	   </td>
      </tr>
	  <tr>
       <td align="right">Email:</td>
       <td align="left"><input type="text" name="txtEmail" value="<?php echo $txtEmail; ?>" size="30" maxlength="40" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
     </table>
	  </fieldset>
     <p>
	  <fieldset class="box_secundario">
      <legend class="titulo">Dados Escolares</legend>
      <table border="0" align="left" cellspading="2" cellspacing="2">
      <tr>
       <td align="right">Curso Ensino Médio:</td>
       <td align="left"><input type="text" name="txtEnsMed" value="<?php echo $txtEnsMed; ?>" maxlenght="40" size="30">
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr>
       <td align="right">Institiução:</td>
       <td align="left"><input type="text" name="txtInst" value="<?php echo $txtInst; ?>" maxlenght="40" size="30" />
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  </table>
	  </fieldset>
	  <p>
	  <fieldset class="box_secundario">
      <legend class="titulo">Opções de Curso</legend>
	  <table border="0" align="left" cellspading="2" cellspacing="2">
	  <tr>
	  <td colspan="3" align="left">Selecione os dados para efetuar a matrícula&nbsp;
       <a href="#" onClick="window.open('../SGDR/popups/popupturma.php', 'popupturma', 'STATUS=NO, TOOLBAR=NO,        LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=100, WIDTH=400, HEIGHT=400');">
		<img src="imagens/icone_buscar.gif" alt="Procurar dados da Matrícula" border="0"></a>&nbsp;<br></td>
       </tr>
       <tr>
       <td align="right">Curso:</td>
       <td align="left"><input type="type" name="txtCurso" value="<?php echo $txtCurso; ?>" maxlength="40" size="30">
	   <span class="aviso">*</span>
	   </td>
       <td align="right">Turno:</td>
       <td align="left"><input type="type" name="turno" value="<?php echo $turno; ?>" maxlength="40" size="30">
	   <span class="aviso">*</span>
	   </td>
	  </tr>
	  <tr> 
	  <td align="right">Turma:</td>
      <td align="left"><input type="type" name="turma" value="<?php echo $turma;?>" maxlength="40" size="30">
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
       <td align="left"><input type="type" name="login" value="<?php echo $login; ?>" maxlength="10" size="20">
	   <span class="aviso">*</span>
	   </td>
	   </tr>
	   <tr>
       <td align="right">Senha:</td>
       <td align="left"><input type="password" name="senha" value="<?php echo $senha; ?>" maxlength="10" size="20">
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  <tr> 
	  <td align="right">Nome:</td>
       <td align="left"><input type="type" name="nome" value="<?php echo $nome;?>" maxlength="20" size="20">
	   <span class="aviso">*</span>
	   </td>
      </tr>
	  </table>
	 </fieldset>
     <p>
   </fieldset> 
   <p>
   <div align="center">
   <input type="button" value="Cancelar" class="botao" onClick="javascript:window.location.href='administracao.php'">&nbsp;
   <input type="SUBMIT" value="Incluir" class="botao" name="Incluir">&nbsp;
   <input type="SUBMIT" value="Alterar" class="botao" name="Alterar">&nbsp;
   <input type="SUBMIT" value="Excluir" class="botao" name="Excluir">&nbsp;
   <input type="BUTTON" value="Consultar" class="botao" name="Consultar" onClick="javascript:window.location.href='pes_aluno.php'">&nbsp;
 </form>
 </div>
	 <hr size="1">
 </div>
 <div id="rodape">
    Copyright© SGDR - Sistema de Gerenciamento Didático Remoto. Todos os direitos reservados.
 </div>
</div>

</body>
</html>

