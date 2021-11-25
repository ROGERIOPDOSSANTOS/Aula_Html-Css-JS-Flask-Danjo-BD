<?php
    
    require_once './class/user.php';
    require_once './class/master.php';

    $u = new User;
    $mm = new Master;

    $dbname = "u323639207_godoycustom";
    $host = "sql220.main-hosting.eu";
    $name = "u323639207_godoycustom";
    $password = "Godoy123";

    $mm->connect($dbname, $host, $name, $password);

?>
<html>
    <main>
        <?php
        
            if(isset($_SESSION['username'])){
                echo "Nome de Usuário: ".$_SESSION['username']."<br>";
            }

        ?>
        <form method="POST">
            <input name="username" type="text" placeholder="Nome de usuário">
            <input name="password" type="password" placeholder="Senha">
            <input type="submit" placeholder="Login">
        </form>
        <hr>
        <?php

            if(isset($_POST['username'])){

                $formUsername = addslashes($_POST['username']);
                $formPassword = addslashes($_POST['password']);

                if($u->login($formUsername, $formPassword)){

                    echo "LOGIN REALIZADO COM SUCESSO!<br>";

                }
                else{

                    echo "Erro. Tente novamente.";

                }

            }

            if(isset($_SESSION['username'])){

                $con = $mm->listTable("message");

                while($row = $con->fetch(PDO::FETCH_ASSOC)){

                    echo "Nome: ".$row['message_name']."<br>";
                    echo "E-mail: ".$row['message_email']."<br>";
                    echo "Telefone: ".$row['message_phone']."<br>";
                    echo "Mensagem: ".$row['message_desc']."<br><hr>";

                }

            }

        ?>
    </main>
</html>