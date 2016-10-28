(function () {
    
    'use strict';
    
    var Validator = rettiwt.Validator = {};
    
    Validator.validateEmail = function (email) {
        if (email && email.length > 0) {
            if (email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
                return true;
            } else {
                return 'Invalid email address.';
            }
        } else {
            return 'Email address is required.';
        }
    };
    
    Validator.validateUsername = function (username) {
        if (username && username.length > 0) {
            return true;
        } else {
            return 'Username is required.';
        }
    };
    
    Validator.validatePassword = function (password) {
        if (password && password.length > 0) {
            if (password.length >= 6) {
                return true;
            } else {
                return 'Password must be at least 6 characters.';
            }
        } else {
            return 'Password is required.';
        }
    };
    
    Validator.validateTweet = function (tweet) {
        if (tweet && tweet.length > 0) {
            if (tweet.length <= 140) {
                return true;
            } else {
                return 'Tweet must be within 140 characters.';
            }
        } else {
            return 'Tweet is required';
        }
    }
    
}());