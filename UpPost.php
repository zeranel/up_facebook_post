<?php
include('src/up.class.php');

$token = "";
$groupid = "";
$postid = "";

$new = new UpPostFacebook();
$new->setToken($token);
$do = $new->up($groupid, $postid);
print_r($do);

?>
