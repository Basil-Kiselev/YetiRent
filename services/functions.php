<?php

function checkLoginUser ()
{
    if (empty($_SESSION['user'])) {
        header("location:login.php");
    }
}