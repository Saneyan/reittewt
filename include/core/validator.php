<?php

function validateEmail($email) {
    if ($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return 'Invaild email address.';
        }
    } else {
        return 'Email address is required.';
    }
}

function validateUsername($username) {
    if ($username) {
        return true;
    } else {
        return 'Username is required';
    }
}

function validatePassword($password) {
    if ($password) {
        if (count($password) >= 6) {
            return true;
        } else {
            return 'Password must be at least 6 characters.';
        }
    } else {
        return 'Password is required.';
    }
}

function validateTweet($tweet) {
    if ($tweet) {
        if (count($tweet) <= 140) {
            return true;
        } else {
            return 'Tweet must be within 140 characters.';
        }
    } else {
        return 'Tweet is required.';
    }
}