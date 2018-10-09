<?php
session_start();
if(isset($_SESSION['email']))
{
			//$hash = $_SESSION['hash'];
			$useremail = $_SESSION['email'];
			$id = $_SESSION['id'];

} else
{
	echo "error";
	exit();
}

if (isset($_GET['id'])){
	$test = $_GET['id'];
	//echo $test;

	$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "research";
			$datas = array();
			//echo $useremail;
			// Create connection
      $i=0;
			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM tradusers WHERE userid = ".$test;
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck == 1)
       {
			    /* fetch object array */
			    while ($row = mysqli_fetch_assoc($result))
          {
			        $datas[] = $row;
			    }

			}
      else
      {
        while ($row = mysqli_fetch_assoc($result))
        {
            $datas[] = $row;
        }
        for($i=0; $i<$resultcheck; $i++){
          echo $datas[$i]['userid']." ". $datas[$i]['username']." ". $datas[$i]['password']." ". $datas[$i]['email'].'<br>';
        }


      }






}

?>



<!DOCTYPE html>
<html>
<head>
	<title>TradProfile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="float-right" style="margin: 50px;">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='logout.php'">Logout</button>
  </div>

  <h3 style="text-align: center; margin-left: 150px;">Welcome <?php echo $datas[0]['username']; ?>!</h3>


</body>



</html>
