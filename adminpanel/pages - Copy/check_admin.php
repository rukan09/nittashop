<?php
session_start();

    $userid = "";

    if(isset($_SESSION['userid']))
    {
        if($_SESSION['user_type']=="Admin")
        {
            $userid = $_SESSION['userid'];
        }
        else
        {
            header('location:../../index.php');
        }

    }

   

?>


