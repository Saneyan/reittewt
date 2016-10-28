<?php

require_once '../../../include/app.php';
require_once '../../../include/core/view/render.php';
require_once '../../../include/core/controller/controller.php';
require_once '../../../include/model/user-model.php';
require_once '../../../include/service/account-service.php';

// Before filter
if (isSignedIn()) {
    redirectTo('timeline.php');
}

// Post
if (isPost()) {
    $credential = (string) filter_input(INPUT_POST, 'credential');
    $password   = (string) filter_input(INPUT_POST, 'password');
    
    if (($user = checkCredentials($credential, $password)) !== false) {
        signIn($user['id']);
        redirectTo('timeline.php');
    } else {
        error('Authentication failed.');
    }
}

// Rendering
render('signin', array(
    'errors' => extractErrors()
));