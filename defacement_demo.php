<?php

$output = "";

if (isset($_POST["submit"])) {

    // INTENTIONALLY VULNERABLE
    $output = $_POST["message"];

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>XSS Defacement Demo</title>
</head>
<body>

<h1>Sample Website</h1>

<form method="POST">

    <label>Message:</label>
    <input type="text" name="message" style="width:400px;">

    <button type="submit" name="submit">
        Submit
    </button>

</form>

<hr>

<?php
echo $output;
?>

</body>
</html>
