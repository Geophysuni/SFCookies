<?php

unset($_COOKIE['user']);
setcookie('user','',time()-3600);

?>
    <html>
        <script>
            window.location.href="index.php";
        </script>
    </html>
    <?php
?>