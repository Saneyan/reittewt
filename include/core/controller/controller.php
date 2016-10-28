<?php

$errors = array();
$inputErrors = array();

function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isGet() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function redirectTo($url) {
    header('location: ' . $url);
    exit();
}

function respondJson($data) {
    echo encode_json($data);
    exit();
}

function error($message) {
    global $errors;
    
    $errors[] = $message;
}

function inputError($name, $message) {
    global $inputErrors;
    
    $inputErrors[$name] = $message;
}

function extractErrors() {
    global $errors;
    global $inputErrors;
    
    return array(
        'messages' => $errors,
        'inputs'   => $inputErrors
    );
}

function hasErrors() {
    return count($errors) > 0 && count($inputErrors) > 0;
}
