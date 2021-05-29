<?php
//==================================================================================================//
//                                                                                                  //
//     Criado por.......................: Flavio Theruo Kaminisse                                   //
//     Site.............................: http://www.japs.etc.br                                    //
//     Contato..........................: flavio@japs.etc.br                                        //
//     Data Criacao.....................: 17/02/2006                                                //
//                                                                                                  //
//==================================================================================================//
?>
<? include("includes/_conection.php"); ?>
<? require_once("includes/xajax/xajax.inc.php"); ?>
<? include("includes/funcoes_php_ajax.php"); ?>
<?
$xajax = new xajax();
$xajax->registerFunction("ExibeConteudoInserir");
$xajax->registerFunction("ExibeConteudoBuscar");
$xajax->registerFunction("ExibeConteudoDropDown");
$xajax->registerFunction("ExibeConteudoVotacao");
$xajax->registerFunction("ExibeConteudoContato");
$xajax->registerFunction("GravaDados");
$xajax->registerFunction("BuscaDados");
$xajax->registerFunction("BuscaCidades");
$xajax->registerFunction("Votacao");
$xajax->registerFunction("enviaEmail");
$xajax->statusMessagesOn();
//$xajax->debugOn();
$xajax->processRequests();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Exemplos AJAX</title>
<link  href="estilos/estilos.css" type="text/css" rel="stylesheet" />
<?php $xajax->printJavascript('includes/xajax/','',''); ?>
<script type="text/javascript" src="script/funcoes_uteis.js"></script>
</head>

<body>
<div id="conteudo">
	<noscript><div id="noscript">Habilite o JavaScript de seu browser para navegar nesta p&aacute;gina.</div></noscript>
	
	<div id="carregando" class="desaparece">Carregando...</div>
	
	<div id="enviando" class="desaparece">Enviando...</div>
	
	<div id="menu">
		<a href="javascript:;" onClick="javascript:InserirRegistro();">Inserir</a> | 
		<a href="javascript:;" onClick="javascript:PesquisaRegistro();">Pesquisa</a> | 
		<a href="javascript:;" onClick="javascript:DropDown();">Drop Down</a> | 
		<a href="<?=$EnderecoSite?>autosuggest.php">Sugest&atilde;o de Texto</a> | 
		<a href="javascript:;" onclick="javascript:Votacao('1');">Vota&ccedil;&atilde;o Online</a> | 
		<a href="javascript:;" onClick="javascript:Contato();">Contato</a>
	</div>
	
	<div id="conteudo_ajax"></div>
	
	<div id="resposta"></div>
</div>
</body>
</html>