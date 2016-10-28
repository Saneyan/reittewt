(function () {
    
    'use strict';
    
    var Command = rettiwt.Command = {};
    
    Command.createTweet = function (tweet, onSuccess, onError) {
        $.ajax({
            url: 'api/tweet.php',
            method: 'POST',
            data: { tweet: tweet },
            success: onSuccess,
            error: onError
        });
    };
    
    Command.deleteTweet = function (tweetId, onSuccess, onError) {
        $.ajax({
            url: 'api/delete-tweet.php',
            method: 'POST',
            data: { tweet_id: tweetId },
            success: onSuccess,
            error: onError
        });
    }
    
    Command.replyTweet = function (reply, tweeId, onSuccess, onError) {
        $.ajax({
            url: 'api/reply.php',
            method: 'POST',
            data: { reply: reply, tweet_id: tweetId },
            success: onSuccess,
            error: onError
        });
    };
    
    Command.retweet = function (tweetId, onSuccess, onError) {
        $.ajax({
            url: 'api/retweet.php',
            method: 'POST',
            data: { tweet_id: tweetId },
            success: onSuccess,
            error: onError
        })
    };
    
    Command.followUser = function (userId, onSuccess, onError) {
        $.ajax({
            url: 'api/follow.php',
            method: 'POST',
            data: { user_id: userId },
            success: onSuccess,
            error: onError
        })
    };
    
    Command.unfollowUser = function (userId, onSuccess, onError) {
        $.ajax({
            url: 'api/unfollow.php',
            method: 'POST',
            data: { user_id: userId },
            success: onSuccess,
            error: onError
        })
    };
    
}());