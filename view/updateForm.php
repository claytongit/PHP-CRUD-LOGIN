<?php
    require_once '../init.php';

    $userId = isset($_GET['id'])?(int)$_GET['id']:null;

    if(empty($userId)){
        echo 'O código do email para alteração está vazio';
        exit;
    }

    $pdo = Server();

    $sql = 'SELECT nome FROM cadastro WHERE id = :id';
    $cmd = $pdo->prepare($sql);
    $cmd->bindParam(':id', $userId, PDO::PARAM_INT);
    $cmd->execute();
    $response = $cmd->fetch(PDO::FETCH_ASSOC);

    if(!is_array($response)){
        echo 'Nenhum usuario encontrado';
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="../controller/update.php" method="post">
        <input type="text" name="name" id="name" placeholder="Informe seu nome" value=<?php echo $response['nome']; ?> />
        <input type="hidden" name="id" id="id" value=<?php echo $userId ?> />
        <button type="submit">editar</button>
        <a href="form.php">Voltar</a>
    </form>
</body>
</html>