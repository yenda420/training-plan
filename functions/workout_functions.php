<?php
    function echoSplit($workoutsPerWeek) {

        switch ($workoutsPerWeek) {
            case 1: {
                echo "
                    <li><a href='#3'><strong>Pondělí</strong> - Fullbody</a></li>
                    <li><a href='#rest'><strong>Úterý</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Středa</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Čtvrtek</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Pátek</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Sobota</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            case 2: {
                echo "
                    <li><a href='#4'><strong>Pondělí</strong> - Upper body</a></li>
                    <li><a href='#rest'><strong>Úterý</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Středa</strong> - Rest day</a></li>
                    <li><a href='#5'><strong>Čtvrtek</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Pátek</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Sobota</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            case 3: {
                echo "
                    <li><a href='#4'><strong>Pondělí</strong> - Upper body</a></li>
                    <li><a href='#rest'><strong>Úterý</strong> - Rest day</a></li>
                    <li><a href='#5'><strong>Středa</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Čtvrtek</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Pátek</strong> - Rest day</a></li>
                    <li><a href='#3'><strong>Sobota</strong> - Fullbody</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            case 4: {
                echo "
                    <li><a href='#4'><strong>Pondělí</strong> - Upper body</a></li>
                    <li><a href='#5'><strong>Úterý</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Středa</strong> - Rest day</a></li>
                    <li><a href='#4'><strong>Čtvrtek</strong> - Upper body</a></li>
                    <li><a href='#5'><strong>Pátek</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Sobota</strong> - Rest day</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            case 5: {
                echo "
                    <li><a href='#4'><strong>Pondělí</strong> - Upper body</a></li>
                    <li><a href='#5'><strong>Úterý</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Středa</strong> - Rest day</a></li>
                    <li><a href='#7'><strong>Čtvrtek</strong> - Pull day</a></li>
                    <li><a href='#6'><strong>Pátek</strong> - Push day</a></li>
                    <li><a href='#5'><strong>Sobota</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            case 6: {
                echo "
                    <li><a href='#7'><strong>Pondělí</strong> - Pull day</a></li>
                    <li><a href='#6'><strong>Úterý</strong> - Push day</a></li>
                    <li><a href='#5'><strong>Středa</strong> - Leg day</a></li>
                    <li><a href='#7'><strong>Čtvrtek</strong> - Pull day</a></li>
                    <li><a href='#6'><strong>Pátek</strong> - Push day</a></li>
                    <li><a href='#5'><strong>Sobota</strong> - Leg day</a></li>
                    <li><a href='#rest'><strong>Neděle</strong> - Rest day</a></li>
                ";
            }break;

            default: {
                echo "<span class='warning1'>Chyba v proměnné '$workoutsPerWeek'.</span>";
            }break;
        }
    }

    function returnUsersWorkouts($dbConnect, $userID) {
        
        $sql = "
            SELECT ID_T
            FROM uzivatele_treninky
            WHERE ID_U = $userID;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $usersWorkouts = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $usersWorkouts;
    }

    function returnWorkoutHeader($dbConnect, $workoutID) {
        $sql = "
            SELECT ID_T, nazev_t
            FROM treninky
            WHERE ID_T = $workoutID;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $workouts = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $workouts;
    }

    function returnExercises($dbConnect, $workoutID) {

        $sql = "
            SELECT c.nazev_c, c.serie, c.opakovani, c.vaha, c.pauzy
            FROM cviky c
            JOIN plan p ON c.ID_C = p.ID_C
            JOIN treninky t ON t.ID_T = p.ID_T
            WHERE t.ID_T = $workoutID
            ORDER BY c.poradi;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $exercises = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $exercises;
    }

    function returnAllExercises($dbConnect) {
        $sql = "
            SELECT c.nazev_c, c.serie, c.opakovani, c.vaha, c.pauzy
            FROM cviky c
            ORDER BY c.poradi;
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $exercises = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);

        return $exercises;
    }