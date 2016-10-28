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
    $tweetId = filter_input(INPUT_POST, 'tweet_id');
    
    $targetTweet = findTweetById($tweet);
    
    if ($targetTweet) {
        $currentUser = getCurrentUser();
        $result = retweet($targetTweet, $currentUser['id']);
        
        if ($result) {
            // Rendering
            respondJson($result);
        } else {
            error('Cannot retweet the tweet.');
        }
    } else {
        error('Target tweet is not found.');
    }
} else {
    error('This method is not allowed.');
}

// Rendering
respondJson(['errors' => extractErrors()]);
