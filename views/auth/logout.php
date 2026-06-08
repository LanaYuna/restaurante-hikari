<?php

session_start();

// 2. Remove todas as variáveis da sessão
session_unset();

// 3. Destrói a sessão no servidor
session_destroy();


if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

header("Location: ../../index.php");
exit();

?>