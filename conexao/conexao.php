<?

if ($conexao = pg_connect ("host=localhost user=postgres port=5432 dbname=bd_sgdr password=post")){
 echo '';
 }else{
   echo 'FALHA NA CONEXÃO!';
   }

?>