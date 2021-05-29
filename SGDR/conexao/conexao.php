<?

if ($conexao = pg_connect ("host=localhost user=postgres port=5432 dbname=SGDR password=post")){
 echo '';
 }else{
   echo 'FALHA NA CONEXÃO!';
   }

?>