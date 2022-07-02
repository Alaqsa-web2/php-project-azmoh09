<?php
// بداية الجلسة 
session_start();

// Unset all of the session variables
$_SESSION = array();

//تدمير الجلسلة
session_destroy();


// Redirect to login page
header("location: login.php");
exit;
