<?php
    $title = "";
    $CSSpath = "style/main_style.css";
    $imgDir = "img";
    
    session_start();
    
    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
    }

    require("db_connect.php");
    require("functions/workout_functions.php");
    
    $usersWorkouts = returnUsersWorkouts($dbConnect, $_SESSION["user"]["ID_U"]);

    require("main_html_top.phtml");
    require("main.phtml");
    require("html_bottom.phtml");