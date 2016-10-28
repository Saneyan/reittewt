<?php

require_once '../../../include/app.php';
require_once '../../../include/core/controller/controller.php';
require_once '../../../include/service/account-service.php';

if (!isSignedIn()) {
    signOut();
}

redirectTo('signin.php');