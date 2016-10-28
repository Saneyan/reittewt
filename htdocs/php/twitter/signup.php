<?php

require_once '../../../include/app.php';
require_once '../../../include/core/controller/controller.php';
require_once '../../../include/model/user-model.php';
require_once '../../../include/core/validator.php';
require_once '../../../include/core/view/render.php';
require_once '../../../include/service/account-service.php';

// Before filter
if (isSignedIn()) {
    redirectTo('timeline.php');
}

// Post
if (isPost()) {
    $username = (string) filter_input(INPUT_POST, 'username');
    $email    = (string) filter_input(INPUT_POST, 'email');
    $password = (string) filter_input(INPUT_POST, 'password');
    $bio      = (string) filter_input(INPUT_POST, 'bio');
    $address  = (string) filter_input(INPUT_POST, 'address');
    
    if (($result = validateEmail($email)) !== true) {
        inputError('email', $result);
    }
    
    if (($result = validateUsername($username)) !== true) {
        inputError('username', $result);
    }
    
    if (($result = validatePassword($password)) !== true) {
        inputError('password', $result);
    }
    
    if (!hasErrors()) {
        $user = createUser(array(
            'username' => $username,
            'email'    => $email,
            'password' => $password,
            'bio'      => $bio,
            'address'  => $address
        ));
        
        if ($user) {
            signIn($user['id']);
            redirectTo('timeline.php');
        } else {
            error('Cannot create a new user.');
        }
    }
}

// Rendering
render('signup', array(
    'errors' => extractErrors()
));