<?php
    $imgDir = "img";
    $title = " | Seznam cviků";
    $CSSpath = "style/main_style.css";

    session_start();

    require("db_connect.php");
    require("functions/muscle_groups_functions.php");
    require("functions/workout_functions.php");
    
    $muscleGroups = returnAllMuscleGroups($dbConnect);

    if (isset($_POST["muscle-group"])) {

        if (empty($_POST["muscle-group"])) {
            $exercises = returnAllExercises($dbConnect);
        } else {
            $exercises = returnExercisesForSelectedMuscleGroup($dbConnect, $_POST);
        }

    } else {
        $exercises = returnAllExercises($dbConnect);
    }

    require("main_html_top_no_login.phtml");
    require("exercises_no_login.phtml");
    require("html_bottom.phtml");