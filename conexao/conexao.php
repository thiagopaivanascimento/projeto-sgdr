<?php

if ($conexao = pg_connect("host=localhost user=postgres port=5433 dbname=bd_sgdr password=postgres")){
    echo '';
}else{
    echo 'FALHA NA CONEXÃO!';
}

?>