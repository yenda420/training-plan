<?php
    $title = " | Úprava profilu";
    $CSSpath = "style/settings_style.css";
    $imgDir = "img";
    $allowedTypes = [
        "image/jpeg",
        "image/png",
        "image/webp",
        "image/gif"
    ];

    session_start();
    
    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
    }

    require("db_connect.php");
    require("functions/user_functions.php");

    if (!file_exists($imgDir))
        mkdir($imgDir);

    if (isset($_POST["delete-account"])) {
        if (deleteUser($dbConnect, $_SESSION["user"]["ID_U"])) {
            if (deleteCookiesData()) {
                
                if (empty($_SESSION["message"])) {
                    $_SESSION["message"][] = "Profil byl smazán.";
                }

                header("Location: logout.php");
                exit;
            }
        }
    }

    require("html_top.phtml"); 

    echo "
        <h1>Úprava profilu</h1>
        <div class='box-messages'>
            <div class='messages'>
    ";

    if (isset($_FILES["profile-pic"])) {
        if ($_FILES["profile-pic"]["error"] == 0) {
            if (in_array($_FILES["profile-pic"]["type"], $allowedTypes)) {

                updateProfilePic($dbConnect, $_FILES, $_SESSION["user"]["ID_U"]);

                if (!file_exists("$imgDir/" . $_FILES["profile-pic"]["name"])) {
                    move_uploaded_file(
                        $_FILES["profile-pic"]["tmp_name"],
                        "$imgDir/" . $_FILES["profile-pic"]["name"]
                    );
                }
                
                echo '<span class="warning1 green">Profilový obrázek byl změněn.</span>';
            } else {
                echo '<span class="warning1 red">Profilový obrázek má nevhodný formát.</span>';
            }
        } else {
            echo '<span class="warning1">Profilový obrázek nebyl změněn.</span>';
        }
    }
    
    if (isset($_POST["new-username"])) {
        if (!empty($_POST["new-username"])) {
            if (!userExists($dbConnect, $_POST["new-username"])) {

                updateUsername($dbConnect, $_POST, $_SESSION["user"]["uzivJmeno"]);
                echo '<span class="warning2 green">Uživatelské jméno bylo změněno.</span>';

            } else { 
                echo '<span class="warning2 red">Uživatel s tímto jménem již existuje :(</span>';
            }
        } else {
            echo '<span class="warning2">Uživatelské jméno nebylo změněno.</span>';
        }
    } 

    if (isset($_POST["new-password"])) {

        if (!empty($_POST["new-password"])) {
            if (!empty($_POST["new-password"] && !empty($_POST["new-password-again"]))) {
                if ($_POST["new-password"] == $_POST["new-password-again"]) {
                    if (!empty($_POST["old-password"])) {
                        if (sha1($_POST["old-password"]) == $_SESSION["user"]["heslo"]) {

                            updatePassword($dbConnect, $_POST);
                            echo '<span class="warning3 green">Heslo bylo změněno.</span>';

                        } else {
                            echo '<span class="warning3 red">Špatné heslo.</span>';
                        }
                    } else {
                        echo '<span class="warning3 red">Zadej staré heslo.</span>';
                    }
                } else {
                    echo '<span class="warning3 red">Hesla se musí shodovat.</span>';
                }
            } else {
                echo '<span class="warning3 red">Zadej heslo znovu.</span>';
            }
        } else {
            echo '<span class="warning3">Heslo nebylo změněno.</span>';
        }
    }

    echo "
            </div>
        </div>
    ";
  
    require("settings.phtml");
    require("html_bottom.phtml");