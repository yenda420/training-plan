<?php
    session_start();

    if (!empty($_SESSION["message"])) {
        unset($_SESSION["message"]);
    }

    header("Location: index.php");
    exit;