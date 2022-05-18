<?php
include "includes/headerChef.php";

?>

<?php

$adminuid = $_SESSION["uid"];
$adminuserid = $_SESSION["userid"];
$adminpassword = $_SESSION["password"];
$adminfirstname = $_SESSION["firstname"];
$adminlastname = $_SESSION["lastname"];
$adminphone = $_SESSION["phone"];
$adminemail = $_SESSION["email"];


?>

<!DOCTYPE HTML>
<html lang="en">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/standardise.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="mainheader">
            <header>Chef Home</header>
        </div>
    </body>
</html>

<?php

include "includes/footer.php";

?>