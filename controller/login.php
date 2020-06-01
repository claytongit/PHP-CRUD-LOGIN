<?php
    session_start();

    require_once '../init.php';    

    $user = isset($_POST['Email']) ? $_POST['Email'] :null;

    $password = isset($_POST['pass']) ? $_POST['pass'] : null;

    $pdo = Server();

    $sqlUser = 'SELECT email FROM register WHERE email = :e';

    $cmd = $pdo->prepare($sqlUser);

    $cmd->bindParam(':e', $user);

    $cmd->execute();

    $emailUser = $cmd->fetch(PDO::FETCH_ASSOC);

    if($emailUser == true){
        $sqlPass = 'SELECT password FROM register WHERE password = :p';

        $cmd = $pdo->prepare($sqlPass);

        $cmd->bindParam(':p', md5($password));

        $cmd->execute();

        $passUser = $cmd->fetch(PDO::FETCH_ASSOC);

        if($passUser == true){

            /*$secret = bin2hex(random_bytes(23));

            $hash = hash('ripemd128', $secret);

            $token = 'Bearer '.$hash;

            header('Authorization: '.$token);*/

            $_SESSION['user'] = $user; 
            
            header('Location: ../view/form.php');              
            
        }else{
            echo "<script>alert('Senha incorreta!');document.location='../view/login.php'</script>";
        }

    }else{
        echo "<script>alert('Email não existe!');document.location='../view/login.php'</script>";
    }