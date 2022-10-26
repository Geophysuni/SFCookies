<?php

require __DIR__ . '/functions.php';

$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;


if (null !== $username || null !== $password) {
    
    
    if( checkPassword($username, $password) == true){


    setcookie("user", $username);
    setcookie("sessionStrat", date("H:i:s"));
    setcookie("personalact", getRandAction());

    // Стартуем сессию:
    session_start(); 

    // Пишем в сессию информацию о том, что мы авторизовались:
    $_SESSION['auth'] = true; 
    // Пишем в сессию логин и id пользователя
    $_SESSION['login'] = $username;


    // echo getUser($username)["fullname"];

    ?>
    <html>
        <script>
            window.location.href="index.php";
        </script>
    </html>
    <?php

    // echo $auth = $_SESSION['auth'];

    }else{
        echo "Такого пользователя не существет";?>
        <html>
            <a href="index.php" >Вернуться на главуню страницу</a>
        </html>
        <?php
    }
    
}
?>