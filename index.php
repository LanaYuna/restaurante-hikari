<?php

include "./config/session.php";

if($_SESSION["usuario_tipo"] == "cliente"){

    header("Location: ./views/cliente/menu.php");
    die;
} elseif($_SESSION["usuario_tipo"] == "admin"){

    header("Location: ./views/admin/menu.php");
    die;
}


?>

