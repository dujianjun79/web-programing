<?php
session_start();
#if(!isset($_SESSION['sess_user_id'])|| trim($_SESSION['sess_user_id']))
#    header("Location: login.html"); 
#    exit();
?>
<html>
    <body>
        <h1>Welcome: <?php echo $_SESSION['sess_user_id']?></h1>
        <h2>Your user name is: <?php echo $_SESSION['sess_username'] ?></h2>
    </body>
</html>