<?php



$auth = $_SESSION['auth'] ?? null;
// echo $_SESSION['login'];

if(!$auth) { ?>
  <html>
    <head>
    <link rel="stylesheet" href="/styles/styles.css">
    <form class = "loginsecion" action="auth.php" method="post">
          <input name="login" type="text" placeholder="Логин">
          <input name="password" type="password" placeholder="Пароль">
          <input name="submit" type="submit" value="Войти">
      </form>
    </head>
  <body>
      
  </body>
  </html>



<?php }else{
    echo "I dont know you";
}
?>

