<?php
    require_once '../init.php';

    $emailUser = isset($_POST['email'])?$_POST['email']:null;

    $passUser = isset($_POST['password'])?$_POST['password']:null;

    $email = addslashes($emailUser);

    $password = addslashes($passUser);

    if(empty($email) && empty($password)){
        echo "<script>alert('Preenha todos os campos!');</script>";
    }else{
        $pdo = Server();

        $sql = 'INSERT INTO register (email, password) VALUES (:e, :p)';

        $cmd = $pdo->prepare($sql);

        $cmd->bindValue(':e', $email);

        $cmd->bindValue(':p', md5($password));

        if($cmd->execute()){
            echo "<script>alert('Cadastro feito com sucesso!');document.location='../view/login.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar');document.location='../view/register.php'</script>";        
        }

    }
