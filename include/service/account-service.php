<?php

require_once '../../../include/model/user-model.php';

function signIn($userId) {
    $user = getUserById($userId);
    $_SESSION['userId'] = $user['id'];
}

function signOut() {
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
}

function isSignedIn() {
    return isset($_SESSION['userId']);
}

function getCurrentUser() {
    return getUserById($_SESSION['userId']);
}