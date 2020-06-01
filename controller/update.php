<?php

 require_once '../init.php';

    $idUser = isset($_POST['id'])?$_POST['id']:null;
    $nameUser = isset($_POST['name'])?$_POST['name']:null;

    $id = addslashes($idUser);
    $name = addslashes($nameUser);

    $pdo = Server();

    $sql = 'UPDATE cadastro SET nome = :n WHERE id = :i';

    $cmd = $pdo->prepare($sql);

    $cmd->bindParam(':n', $name);
    $cmd->bindParam(':i', $id);
    
    if($cmd->execute()){
        echo "<script>alert('Registro editado com sucesso!');document.location='../view/form.php'</script>";
    }else{
        echo "<script>alert('Falha ao editar!');document.location='../view/form.php'</script>";
    }