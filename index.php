<?php
include("cmx_util.php");

$req = new CMXRequest("config.json", "youriphere");
echo var_dump($req->getResponse());