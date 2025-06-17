<?php
    session_start();

    require("db_connect.php");
    require("functions/user_functions.php");
    
    if (session_destroy()) {
        if (deleteCookiesData()) {
            header("Location: login.php");
            exit;
        }
    }