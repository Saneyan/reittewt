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
    $tweet = (string) filter_input(INPUT_POST, 'tweet');
    
    if (($result = validateTweet($tweet)) !== true) {
        inputError('tweet', $result);
    }
    
    if (!hasErrors()) {
        $currentUser = getCurrentUser();
        
        $result = createTweet($tweet, $currentUser['id']);
        
        if ($result) {
            // Rendering
            respondJson($result);
        } else {
            error('Cannot create a tweet.');
        }
    }
} else {
    error('This method is not allowed.');
}

// Rendering
respondJson(['errors' => extractErrors()]);