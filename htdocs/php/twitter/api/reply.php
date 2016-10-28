<?php

require_once '../../../include/core/controller/controller.php';
require_once '../../../include/model/user-model.php';
require_once '../../../include/model/tweet-model.php';

// Before filter
if (!isSignedIn()) {
    error('Unauthorized error.');
    respondJson(['errors' => extractErrors()]);
}

// Post
if (isPost()) {
    $reply   = (string) filter_input(INPUT_POST, 'reply');
    $tweetId = filter_input(INPUT_POST, 'tweet_id');
    $currentUser = getCurrentUser();
    
    if (($result = validateTweet($reply)) !== false) {
        inputError('reply', $result);
    }
    
    if (!hasErrors()) {
        $targetTweet = findTweetById($tweetId);
        
        if ($targetTweet) {
            $result = replyTweet($targetTweet, $currentUser['id'], $reply);
            
            if ($result) {
                // Rendering
                respondJson($result);
            } else {
                error('Cannot reply to the tweet.');
            }
        } else {
            error('Target tweet is not found.');
        }
    }
} else {
    error('This method is not allowed.');
}

// Rendering
respondJson(['errors' => extractErrors()]);