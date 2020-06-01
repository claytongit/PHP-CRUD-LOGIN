<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <nav style="margin-bottom: 25px;">
        <form action="../controller/search.php" method="get">
            <input type="text" name="search" id="search">
            <button type="submit">Search</button>
        </form>
    </nav>

    <form action="../controller/insert.php" method="post">
        <input type="text" name="name" id="name" placeholder="Informe seu nome">
        <button type="submit">Enviar</button>
    </form>

    <main>    
        <?php
            session_start();           

            require_once '../controller/list.php';            
            
            if($_SESSION['user'] == true){
                echo '<h4>Usuario: '.$_SESSION['user'].'</h4>';
                
                $data = json_decode($json);
            
                foreach($data as $res){
                    echo '<div>';
                    echo '<h4>'.$res->nome.'</h4>
                    <a href="updateForm.php?id='.$res->id.'">editar</a>
                    <a href="#" onclick="alert('.$res->id.')">Excluir</a>';
                    echo '</div>';
                } 
            }else{
                echo 'Error de autenticação';
            } 
           
        ?>
    </main>

    <footer>
            <a href="../controller/logout.php">Sair</a>
    </footer>

    <script>        
        function alert(id){
            var res = confirm('Tem certeza que deseja excluir?');

            if(res == true){
                window.location.href = "../controller/delete.php?id="+id;
            }
        }
    </script>
</body>
</html>