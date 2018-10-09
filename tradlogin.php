<!DOCTYPE html>
<html>
<head>
	<title>Traditional Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

  <div style="width: 200px; margin: 50px;">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='welcome.php'">Home</button>
  </div>

  <h1 style="text-align: center;">Please enter your details</h3>

	<div id="form_container">
		<p style="text-align: center;">Login</p>
	<form action="" method="POST">
		<input class="register_form" type="" name="email" placeholder="email"><br>
		<input class="register_form" type="password" name="pass" placeholder="password"><br>
		<input class="register_form" type="submit" name="">
	</form>
	</div>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $email = $_POST['email'];
  $password = $_POST['pass'];

  if($email && $password != '')
  {
  		$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "research";
			/*$active = 1;*/

			// Create connection
			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("SELECT * FROM tradusers WHERE email=?");
			$stmt->bind_param("s", $email);

			// set parameters and execute
/*			$firstname = "John";
			$lastname = "Doe";
			$email = "john@example.com";*/
			$stmt->execute();



			$result=$stmt->get_result();
                  while($row = $result->fetch_object())
                  {
                    $emailfromdb = $row->email;
										$passwordfromdb = $row->password;
                    $id = $row->userid;
                    if(password_verify($password, $passwordfromdb))
                            {
                              session_start();
                              $_SESSION['logged_in'] = true;
                              $_SESSION['email'] = $emailfromdb;
                              $_SESSION['id'] = $id;

                              header("location: tradprofile.php?id=$id");
                            }
                            else
                            {
                              $_SESSION['message'] = 'username and password do not match';
                              echo $_SESSION['message'];
                            }

                  }

			$stmt->close();
			$conn->close();

  }
  else
  {
  	echo "enter all";
  }
}

?>
