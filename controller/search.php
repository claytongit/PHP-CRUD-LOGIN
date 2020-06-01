<?php
    require_once '../init.php';

    $name = isset($_GET['search'])?$_GET['search']:null;

    $pdo = Server();

    if($name!=''){
        $sql = "SELECT nome FROM cadastro WHERE nome LIKE :n";

        $cmd = $pdo->prepare($sql);

        $cmd->bindParam(':n', $name);

        $cmd->execute();

        $row = $cmd->rowCount();   

        if($row == 0){
            echo 'Nenhum usuario encontrado!';
        }else{
            echo '<p>Resultado: '.$row.'</p>';
            while($response = $cmd->fetch(PDO::FETCH_ASSOC)){
                echo '<p>'.$response['nome'].'</p>';
            }
            echo '<a href="../view/form.php">Voltar</a>';           
        }
    }else{
        echo "<script>alert('Não foi possivel realizar a consulta');document.location='../view/form.php'</script>";   
        exit;
    }