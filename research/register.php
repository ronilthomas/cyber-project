<!DOCTYPE html>
<html>
<head>
	<title>Steganographic Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div style="width: 200px; margin: 50px;">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='welcome.php'">Home</button>
  </div>

	<h1 style="text-align: center;">Please enter your details</h3>

	<div id="form_container">
		<p style="text-align: center;">Register</p>
	<form action="" method="POST">
		<input class="register_form" type="text" name="uname" placeholder="username"><br>
		<input class="register_form" type="email" name="email" placeholder="email"><br>
		<input class="register_form" type="password" name="pass" placeholder="password"><br>
		<input class="register_form" type="password" name="conpass" placeholder="confirm password"><br>
		<input class="register_form btn btn-primary" type="submit" name="">
	</form>
	</div>


</body>
</html>

<?php
	if (isset($_POST["uname"])) {
		$username = $_POST['uname'];
		$email = $_POST['email'];
		$password = $_POST['pass'];
		$conpassword = $_POST['conpass'];

		if($username == '' || $email == '' || $password == '' || $conpassword == '')
		{
			echo "enter all details";
			exit();
		}

		if($password != $conpassword){
		echo "passwords do not match";
		exit();
		}

		$length = strlen($password);
		if ($length<5){
			echo "enter at least 5 letters for password";
			exit();
		}
		else

		{
			$passwordtodb = password_hash("$password", PASSWORD_DEFAULT);
			$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "research";
			$active = 0;


			// Create connection
			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}


			$sql = "SELECT * FROM users";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);
			while ($row = mysqli_fetch_assoc($result))
			{
					$datas[] = $row;
			}
			for($i=0; $i<$resultcheck; $i++){
				if($datas[$i]['email'] == $email)
				{

 			    echo "<div style='display:block;'>user email exists";
 					die();

 			 }
			}









				shell_exec("python /opt/lampp/htdocs/research/enc1.py '$passwordtodb' '$email'");
				//to be used
					$stmt = $conn->prepare("INSERT INTO users (username, email, active) VALUES (?, ?, ?)");
					$stmt->bind_param("ssi", $username, $email, $active);


					$stmt->execute();

					$stmt->close();
					$conn->close();

					session_start();
					$_SESSION['hash'] = $passwordtodb;
					$_SESSION['logged_in'] = true;
					$_SESSION['email'] = $email;
					header("location: regcompleted.php");
					//echo '<p id = "success_block">Registered!! Please click <a href = "login.php">here</a> to login</p>';
					die();


			}






	}




?>
