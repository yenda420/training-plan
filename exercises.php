<?php
    $title = " | Seznam cviků";
    $CSSpath = "style/main_style.css";
    $imgDir = "img";

    session_start();

    require("db_connect.php");
    require("functions/user_functions.php");
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

    require("main_html_top.phtml");
    require("exercises.phtml");
    require("html_bottom.phtml");