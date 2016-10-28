<?php

require_once '../../../include/app.php';
require_once '../../../include/core/view/render.php';
require_once '../../../include/core/controller/controller.php';
require_once '../../../include/core/validator.php';
require_once '../../../include/model/user-model.php';
require_once '../../../include/service/account-service.php';

// Before filter
if (!isSignedIn()) {
    redirectTo('signin.php');
}

$currentUser = getCurrentUser();

// Post
if (isPost()) {
    $updateType = (string) filter_input(INPUT_GET, 'update');
    
    // Post::updateProfile
    if ($updateType === 'profile') {
        $username = (string) filter_input(INPUT_POST, 'username');
        $email    = (string) filter_input(INPUT_POST, 'email');
        $bio      = (string) filter_input(INPUT_POST, 'bio');
        $address  = (string) filter_input(INPUT_POST, 'address');
        
        if (($result = validateEmail($email)) !== true) {
            inputError('email', $result);
        }
        
        if (($result = validateUsername($username)) !== true) {
            inputError('username', $result);
        }
        
        if (!hasErrors()) {
            $result = updateUser(array(
                'id'       => $currentUser['id'],
                'email'    => $email,
                'username' => $username,
                'bio'      => $bio,
                'address'  => $address
            ));
            
            if (!$result) {
                error('Cannot update the user.');
            }
        }
        
    // Post::updateProfileImage
    else if ($updateType === 'image') {
        $image = isset($_FILES['profile_image']) ? $_FILES : null;
        
        if (($result = validateProfileImage($image)) !== true) {
            inputError('profile_image', $result);
        }
        
        if (!hasErrors()) {
            $result = updateUserProfileImage($image, $currentUser['id']);
            
            if (!$result) {
                error('Cannot update the user profile image.');
            }
        }
    }
        
    // Post::updatePassword
    } else if ($updateType === 'password') {
        $currentPassword = (string) filter_input(INPUT_POST, 'current_password');
        $newPassword     = (string) filter_input(INPUT_POST, 'new_password');
        
        if (checkCredentials($currentUser['username'], $currentPassword)) {
            if (($result = validatePassword($newPassword)) !== true) {
                inputError('new_password', $result);
            }
            
            if (!hasError()) {
                $result = updateUserPassword($newPassword, $currentUser['username'], $currentUser['id']);
                
                if (!result) {
                    error('Cannot update the user password.');
                }
            }
        } else {
            error('Authentication failed.');
        }
        
    } else {
        error('Unexpected update type.');
    }
}

// Getting user

// Rendering
render('profile', array(
    'currentUser' => $currentUser,
    'errors'      => extractErrors()
));