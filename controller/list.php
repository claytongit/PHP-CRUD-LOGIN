<?php 
    require_once '../init.php';

    $pdo = Server();

    $sql = 'SELECT * FROM cadastro';

    $cmd = $pdo->prepare($sql);

    $cmd->execute();

    $json_array = array();

    while($response = $cmd->fetch(PDO::FETCH_ASSOC)){
        $json_array[] = $response;
    }
    
    $json = json_encode($json_array);
