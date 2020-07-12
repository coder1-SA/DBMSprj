<?php
session_start();
session_destroy();
if(true){
    header('location:login.php');
}
?>