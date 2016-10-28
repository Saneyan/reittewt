<?php

require_once '../../../include/core/controller/controller.php';
require_once '../../../include/model/user-model.php';

// Before filter
if (!isSignedIn()) {
    error('Unauthorized error.');
    respondJson(['errors' => extractErrors()]);
}

// Post
if (isPost()) {
    $userId = filter_input(INPUT_POST, 'user_id');
    
    $targetUser = findUserById($userId);
    
    if ($targetUser) {
        $currentUser = getCurrentUser();
        
        $result = followUser($targetUser['id'], $currentUser['id']);
        
        if ($result) {
            // Rendering
            respondJson($result);
        } else {
            error('Cannot follow the user.');
        }
    } else {
        error('The user is not found.');
    }
} else {
    error('This method is not allowed.');
}

// Rendering
respondJson(['errors' => extractErrors()]);