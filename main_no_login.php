<?php
    $title = "";
    $imgDir = "img";
    $legDayID = 5;
    $fullbodyID = 3;
    $upperBodyID = 4;
    $numberOfWorkouts = 3;
    $CSSpath = "style/main_style.css";

    if (!file_exists($imgDir)) {
        mkdir($imgDir);
    }

    require("db_connect.php");
    require("functions/workout_functions.php");

    $usersWorkouts = returnUsersWorkouts($dbConnect, $numberOfWorkouts);

    require("main_html_top_no_login.phtml");
    require("main_no_login.phtml");
    require("html_bottom.phtml");