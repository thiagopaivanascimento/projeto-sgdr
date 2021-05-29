<? include('_GLOBALS.php'); ?>
<?
//Seta variaveis de conexao com banco
$host		= "host";
$database	= "database";
$user		= "usuario";
$pwd		= "senha";

//Cria conexao com o banco MySQL
$conexao = mysql_connect($host, $user, $pwd) or die ("Não foi possível estabelecer conexão com o Banco de Dados");
mysql_select_db($database,$conexao);
?>