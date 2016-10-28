<?php

function connectDb() {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($link, 'UTF-8');
    return $link;
}