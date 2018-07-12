<form action="index.php" method="post">
IP Address: <input type="text" name="ip"><br>
<input type="submit" value="Submit">
</form>

<?php
require("cmx_util.php");
if($_POST) {
    $req = new CMXRequest("config.json", $_POST["ip"]);
    echo "<pre>" . json_encode($req->getResponse(), JSON_PRETTY_PRINT) . "</pre>";
}