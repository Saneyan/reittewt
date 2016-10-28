<?php

// Before filter
if (!isSignedIn()) {
    error('Unauthorized error.');
    respondJson(['errors' => extractErrors()]);
}

if (isPost()) {
    $tweetId = filter_input(INPUT_POST, 'tweet_id');
    
    $targetTweet = findTweetById($tweetId);
    
    if ($targetTweet) {
        $result = deleteTweet($targetTweet['id']);
        
        if ($result) {
            respondJson($result);
        } else {
            error('Cannot delete the tweet.');
        }
    } else {
        error('The target tweet is not found.');
    }
} else {
    error('This method is not allowed.');
}

// Rendering
respondJson(['errors' => extractErrors()]);