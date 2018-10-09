<?php
session_start();
$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

  <div style="width: 200px; margin: 50px;">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='welcome.php'">Home</button>
  </div>
  <h3 style="text-align: center;">You have been logged out!</h3>
</body>
</html>
