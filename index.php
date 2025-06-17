<?php
    $title = " | Registrace";
    $CSSpath = "style/form_style.css";

    session_start();

    require("db_connect.php");
    require("functions/user_functions.php");

    if (isset($_COOKIE["password"])) {
        loginByCookies($dbConnect);
        header("Location: main.php");
        exit;
    }

    if (isset($_POST["login"])) {
        if (!userExists($dbConnect, $_POST["login"])) {
            if ($_POST["password"] == $_POST["passwordAgain"]) {

                if (isset($_POST["checkbox"])) {
                    setCookies($_POST["login"], sha1($_POST["password"]));
                }

                addNewUser($dbConnect, $_POST);
                loginUser($dbConnect, $_POST);
                assignWorkouts($dbConnect, $_POST, $_SESSION["user"]["ID_U"]);

                header("Location: main.php");
                exit;
            } else {
                require("html_top.phtml");
                echo "
                    <div class='box-messages'>
                        <div class='messages'>
                ";
                    echo '<span class="warning1">Hesla se musí shodovat.</span>';
                echo "
                        </div>
                    </div>
                ";
            }
        } else {
            require("html_top.phtml");
            echo "
                <div class='box-messages'>
                    <div class='messages'>
            ";
                echo '<span class="warning1">Uživatel s tímto jménem již existuje :(</span>';
            echo "
                    </div>
                </div>
            ";
        }
    } else {
        require("html_top.phtml");
    }
    
    if (!empty($_SESSION["message"])) {
        foreach ($_SESSION["message"] as $message) {
            echo '<span class="warning1">' . "$message" . '</span>';
        }
    }

    require("index.phtml");
    require("html_bottom.phtml");