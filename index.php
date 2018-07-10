<?php
include("cmx_utils.php");

$test = new CMXRequest("config.json", "myIP");
echo $test->getIP() . "<br>";
echo $test->send();