<?php
// session_start();

require __DIR__ . '/functions.php';

$auth = $_SESSION['auth'] ?? null;


if (!$auth && !$_COOKIE["user"]) { ?>
  <html>

  <head>
    <link rel="stylesheet" href="/styles/styles.css">
    <div class="headline">
      <div class="loginsection">
        <a href="login.php">
          <button class="btn btn-primary btn-lg">Login</button>
        </a>
      </div>

    </div>
  </head>

  <body>
    <div class="actionsList">
      <div class="cAction">
        <img class="actImg" src="/img/1.jfif" alt="">
        <p class="actionText">
          Скидка 5% в день рождения
        </p>
      </div>
      <div class="cAction">
        <img class="actImg" src="/img/2.jfif" alt="">
        <p class="actionText">
          Приведи друга и купайтесь вдвоем
        </p>
      </div>
      <div class="cAction">
        <img class="actImg" src="/img/3.jfif" alt="">
        <p class="actionText">
          Языческая пати в день Ивана Купалы
        </p>
      </div>
      <div class="cAction">
        <img class="actImg" src="/img/4.jfif" alt="">
        <p class="actionText">
          Скидка 8% на 8 марта
        </p>
      </div>
    </div>
  </body>

  </html>



<?php } else {

  $act = json_decode(file_get_contents("actions.json"), true, 512, JSON_UNESCAPED_UNICODE);
  $perAct = $act[$_COOKIE['personalact']]

  ?>
  <html>

  <head>
    <link rel="stylesheet" href="/styles/styles.css">
    <div class="headline">
      <div class="loginsection">
        <p style="color:#FFFFFF; margin-top: 0px; margin-right: 10px;"><?php echo $_COOKIE["user"] ?>                
        </p>
        <a href="logout.php">
          <button class="btn btn-primary btn-lg">Logout</button>
        </a>
      </div>

    </div>

  </head>

  <body>
    <div class="personalAction">
      <div class="cAction">
          <img class="actImg" src=<?php echo $perAct['img']?> alt="">
          <p class="actionText">
            <?php echo $perAct['title']?>
          </p>
    </div>
    
    <div>
    <span>
      Время действия персонального предложения:
      <?php 

            $expiry_time = new DateTime($_COOKIE['sessionStrat']);
            $hours = 24;
            $modified = (clone $expiry_time)->add(new DateInterval("PT{$hours}H"));
            $current_date = new DateTime();
            $diff = $modified->diff($current_date);
            echo $diff->format('%H:%I:%S');
            // echo round(abs($_COOKIE['sessionStrat'] - date("H:i:s")));
            // echo date("H:i:s");
            
      ?>
    </span>
    </div>
  </body>

  </html><?php
        }

          ?>