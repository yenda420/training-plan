<?php
    $title = " | Přihlášení";
    $CSSpath = "style/form_style.css";

    session_start();
    
    require("db_connect.php");
    require("functions/user_functions.php");

    if (!empty($_SESSION["message"])) {
        unset($_SESSION["message"]);
    }

    if (isset($_COOKIE["password"])) {
        loginByCookies($dbConnect);
        header("Location: main.php");
        exit;
    }

    if (isset($_POST["login"])) {
        
        if (isset($_POST["checkbox"])) {
            setCookies($_POST["login"], sha1($_POST["password"]));
        }

        if (loginUser($dbConnect, $_POST)) {

            header("Location: main.php");
            exit;
            
        } else {
            require("html_top.phtml");
            echo "
                <div class='box-messages'>
                    <div class='messages'>
            ";
                echo '<span class="warning2">Špatné přihlašovací údaje.</span>';
            echo "
                    </div>
                </div>
            ";
        }
    } else {
        require("html_top.phtml");
    }
 
    require("login.phtml");
    require("html_bottom.phtml");