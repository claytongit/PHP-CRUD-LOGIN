<?php

    require_once '../init.php';

    $user = isset($_POST['name']) ? $_POST['name'] : null;

    $name = addslashes($user);

    $pdo = Server();

    $sql = 'INSERT INTO cadastro (nome) VALUES (:n)';

    $cmd = $pdo->prepare($sql);

    $cmd->bindParam(':n', $name);

    echo $name;

    if($cmd->execute()){
        echo "<script>alert('Registro incluído com sucesso!');document.location='../view/form.php'</script>";
    }else{
        echo "<script>alert('Erro ao registrar');document.location='../view/form.php'</script>";        
    }