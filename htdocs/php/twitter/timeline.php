<?php

require_once '../../../include/core/view/render.php';
require_once '../../../include/core/controller/controller.php';
require_once '../../../include/model/user-model.php';
require_once '../../../include/model/timeline-model.php';
require_once '../../../include/app.php';
require_once '../../../include/service/account-service.php';

// Before filter
if (!isSignedIn()) {
    redirectTo('signin.php');
}

$currentUser = getCurrentUser();

// Get
$timelineType = (string) filter_input(INPUT_GET, 'timeline');

// Get::currentUserTimeline
if ($timelineType === 'current_user') {
    $timeline = getCurrentUserTimeline($currentUser['id']);
    
// Get::otherUsersTimeline
} else if ($timelineType === 'other') {
    $timeline = getOtherUsersTimeline($currentUser['id']);

// Get::currentAndFollowUserTimeline
} else {
    $timeline = getCurrentAndFollowUserTimeline($currentUser['id']);
}

// Rendering
render('timeline', array(
    'timeline'    => $timeline,
    'currentUser' => $currentUser,
    'errors'      => extractErrors()
));