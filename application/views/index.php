<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            HEADER: <a href="<?php echo HTTP_PATH ."index"; ?>">home</a> | <a href="<?php echo HTTP_PATH ."index/register"; ?>">register</a>
            |
            <?php
            if(SecureController::isConnected()){
            ?>
            <a href="<?php echo HTTP_PATH ."index/logout"; ?>">logout</a>
            |
            <a href="<?php echo HTTP_PATH ."index/edit/". $_SESSION['id']; ?>">edit acount</a>
            <?php
            } else {
            ?>
                <a href="<?php echo HTTP_PATH ."index/login"; ?>">login</a>
            <?php
            }
            ?>
        </div>
        <div><?php echo $content; ?></div>
    </body>
</html>
