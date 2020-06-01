<?php
    require_once '../init.php';

    $userId = isset($_GET['id']) ? $_GET['id'] : null;

    if(empty($userId)){
        echo 'O código do email para exclusão não foi definido';
        exit;
    }

    $pdo = Server();

    $sql = 'DELETE FROM cadastro WHERE id = :i';

    $cmd = $pdo->prepare($sql);

    $cmd->bindParam(':i', $userId, PDO::PARAM_INT);

    if($cmd->execute()){
        echo "<script>alert('Registro deletado com sucesso!');document.location='../view/form.php'</script>";
    }else{
        echo "<script>alert('Erro ao deletar registro!');document.location='../view/form.php'</script>";
    }