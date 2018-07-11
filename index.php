<?php
include("cmx_util.php");
// include("chuck.php");

$req = new CMXRequest("config.json", "10.21.45.118");
echo var_dump($req->send());

// $test = new CMXRequest("config.json", "myIP");
// echo $test->getIP() . "<br>";
// echo $test->send();