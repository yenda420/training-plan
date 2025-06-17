<?php
    function returnAllMuscleGroups($dbConnect) {
        
        $sql = "
            SELECT *
            FROM svalove_partie;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $muscleGroups = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $muscleGroups;
    }

    function returnExercisesForSelectedMuscleGroup($dbConnect, $data) {

        $sql = "
            SELECT c.nazev_c, c.serie, c.opakovani, c.vaha, c.pauzy
            FROM svalove_partie s, cviky c
            WHERE s.ID_S = c.ID_S
                AND s.ID_S = '{$data["muscle-group"]}'; 
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $exercises = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $exercises;
    }

    function returnMuscleGroup($dbConnect, $muscleGroupID) {

        $sql = "
            SELECT nazev_s
            FROM svalove_partie
            WHERE ID_S = $muscleGroupID;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $muscleGroup = mysqli_fetch_array($sqlResult)[0];

        return $muscleGroup;
    }