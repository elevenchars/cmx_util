<!-- Simple HTML form -->
<form action="index.php" method="post">
IP Address: <input type="text" name="ip"><br>
<input type="submit" value="Submit">
</form>
<!-- End Simple HTML form -->

<?php
require_once("cmx_util.php");
if($_POST) { // if this is a form submission
    $req = new CMXRequest("config.json", $_POST["ip"]); // create request
    echo "<pre>" . json_encode($req->getResponse(), JSON_PRETTY_PRINT) . "</pre>"; // print it in a readable format
}
