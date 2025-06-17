<?php
    function addNewUser($dbConnect, $userData) {

        $password = sha1("{$userData["password"]}");
        $username = "\"{$userData["login"]}\"";
        $split = $userData["pocet"];
        $imgName = "user-icon.webp";
        
        $sql = "
                INSERT INTO uzivatele (heslo, uzivJmeno, pocTreninku, nazevObrazku)
                VALUES ('{$password}', {$username}, $split, '$imgName');
            ";

        $sqlResult = mysqli_query($dbConnect, $sql);

        if ($sqlResult) {
            return 1;
        } else {
            return 0;
        }
    }

    function loginUser($dbConnect, $userData) {

        $sql = "
            SELECT *
            FROM uzivatele
            WHERE uzivJmeno = '{$userData["login"]}'
                AND heslo = '" . sha1($userData["password"]) . "';
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $user = mysqli_fetch_assoc($sqlResult);

        if ($user) {
            $_SESSION["user"] = $user;

            if (isset($userData["checkbox"])) {
                setcookie("username", $userData["login"], ["expires" => time() + 60*60*24*365]);
                setcookie("password", sha1($userData["password"]), ["expires" => time() + 60*60*24*365]);
            }

            return 1;
        }

        return 0;
    }

    function assignWorkouts($dbConnect, $userData, $userID) {

        $split = (int) $userData["pocet"];

        switch ($split) {

            case 1: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 3);
                ";

            }break;

            case 2: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 4), ($userID, 5);
                ";
    
            }break;

            case 3: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 4), ($userID, 5), ($userID, 3);
                ";
    
            }break;

            case 4: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 4), ($userID, 5);
                ";
    
            }break;

            case 5: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 4), ($userID, 5), ($userID, 6), ($userID, 7);
                ";
    
            }break;

            case 6: {

                $sql = "
                    INSERT INTO uzivatele_treninky (ID_U, ID_T) 
                    VALUES ($userID, 5), ($userID, 6), ($userID, 7);
                ";

            }break;

            default: {
                echo '<span class="warning1">Chyba v přiřazení tréninku.</span>';
            }break;
        }

        $sqlResult = mysqli_query($dbConnect, $sql);

        if ($sqlResult) {
            return 1;
        } else {
            return 0;
        }
    }

    function userExists($dbConnect, $username) {

        $sql = "
            SELECT *
            FROM uzivatele
            WHERE uzivJmeno = '{$username}';
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $numberOfRecords = mysqli_num_rows($sqlResult);

        if ($numberOfRecords == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    function updateUsername($dbConnect, $userData, $oldUsername) {

        $sqlUpdate = "
            UPDATE uzivatele
            SET uzivJmeno = '{$userData["new-username"]}'
            WHERE uzivJmeno = '{$oldUsername}';
        ";

        mysqli_query($dbConnect, $sqlUpdate);

        $sqlSelect = "
            SELECT *
            FROM uzivatele
            WHERE uzivJmeno = '{$userData["new-username"]}';
        ";

        $sqlResult = mysqli_query($dbConnect, $sqlSelect);
        $user = mysqli_fetch_assoc($sqlResult);

        if ($user) {
            $_SESSION["user"] = $user;
            return 1;
        } else {
            return 0;
        }
    }

    function updatePassword($dbConnect, $userData) {

        $oldPassword = sha1("{$userData["old-password"]}");
        $newPassword = sha1("{$userData["new-password"]}");

        $sqlUpdate = "
            UPDATE uzivatele
            SET heslo = '{$newPassword}'
            WHERE heslo = '{$oldPassword}';
        ";

        mysqli_query($dbConnect, $sqlUpdate);

        $sqlSelect = "
            SELECT *
            FROM uzivatele
            WHERE heslo = '{$newPassword}';
        ";

        $sqlResult = mysqli_query($dbConnect, $sqlSelect);
        $user = mysqli_fetch_assoc($sqlResult);

        if ($user) {
            $_SESSION["user"] = $user;
            return 1;
        } else {
            return 0;
        }
    }

    function updateProfilePic($dbConnect, $userData, $userID) {

        $sqlUpdate = "
            UPDATE uzivatele
            SET nazevObrazku = '{$userData["profile-pic"]["name"]}'
            WHERE ID_U = $userID;
        ";

        mysqli_query($dbConnect, $sqlUpdate);

        $sqlSelect = "
            SELECT *
            FROM uzivatele
            WHERE ID_U = $userID;
        ";

        $sqlResult = mysqli_query($dbConnect, $sqlSelect);
        $user = mysqli_fetch_assoc($sqlResult);

        if ($user) {
            $_SESSION["user"] = $user;
            return 1;
        } else {
            return 0;
        }
    }

    function deleteUser($dbConnect, $userID) {

        $sqlDelete1 = "
            DELETE 
            FROM uzivatele_treninky
            WHERE ID_U = $userID;
        ";

        $query1 = mysqli_query($dbConnect, $sqlDelete1);
        echo mysqli_error($dbConnect);

        $sqlDelete2 = "
            DELETE
            FROM uzivatele
            WHERE ID_U = $userID;
        ";

        $query2 = mysqli_query($dbConnect, $sqlDelete2);
        echo mysqli_error($dbConnect);
        
        if ($query1 && $query2) {
            return 1;
        } else {
            return 0;
        }
    }

    function setCookies($username, $password) {
        
        $setCookie1 = setcookie("username", "{$username}", ["expires" => time() + 60*60*24*365]);
        $setCookie2 = setcookie("password", "{$password}", ["expires" => time() + 60*60*24*365]);

        if ($setCookie1 && $setCookie2) {
            return 1;
        } else {
            return 0;
        }
    }

    function loginByCookies($dbConnect) {
        
        $sql = "
            SELECT *
            FROM uzivatele
            WHERE uzivJmeno = '{$_COOKIE["username"]}'
                AND heslo = '{$_COOKIE["password"]}';
        ";

        $sqlResult = mysqli_query($dbConnect, $sql);
        $user = mysqli_fetch_assoc($sqlResult);

        if ($user) {
            $_SESSION["user"] = $user;
            return 1;
        } else {
            return 0;
        }
    }

    function deleteCookiesData() {

        $deleteCookie1 = setcookie("username", 0, ["expires" => time() - 3600]);
        $deleteCookie2 = setcookie("password", 0, ["expires" => time() - 3600]);

        if ($deleteCookie1 && $deleteCookie2) {
            return 1;
        } else {
            return 0;
        }
    }