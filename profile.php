<?php
session_start();
if(isset($_SESSION['email']))
{
			$hash = $_SESSION['hash'];
			$useremail = $_SESSION['email'];
			$id = $_SESSION['id'];

} else
{
	echo "error";
	exit();
}

if (isset($_GET['id'])){
	$test = $_GET['id'];

	$servername = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "research";
			$datas = array();
			//echo $useremail;
			// Create connection
			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM users WHERE userid = ".$test;
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
          echo $datas[$i]['userid']." ". $datas[$i]['username']." ". $datas[$i]['email'].'<br>';
        }


      }


}

?>



<!DOCTYPE html>
<html>
<head>
	<title>StegProfile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="hide" id="content">
	<div class="float-right" style="margin: 50px;">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='logout.php'">Logout</button>
  </div>

	<h3 style="text-align: center; margin-left: 150px;">Welcome <?php echo $datas[0]['username']; ?>!</h3>
</div>

	<!-- Button trigger modal -->
<button style="display: none;" type="button" class="btn btn-primary" id="modal" data-toggle="modal" data-target="#exampleModal">
	Launch demo modal
</button>
<button style="display: none;" type="button" class="btn btn-primary" id="modal2" data-toggle="modal" data-target="#exampleModal2">
	Launch demo modal
</button>
<button style="display: none;" type="button" class="btn btn-primary" id="modal3" data-toggle="modal" data-target="#exampleModal3">
	Launch demo modal
</button>
<button style="display: none;" type="button" class="btn btn-primary" id="modal4" data-toggle="modal" data-target="#exampleModal4">
	Launch demo modal
</button>



<!-- Modal -->
<div style="width:600px; margin:auto;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validating user...</h5>
        <button style="display: none;" id="closemodal1" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<p>The steganographic image has to be accessed to verify the user.</p>
				<p>The name of the image being searched is: '<?php echo $useremail;  ?>.png'.</p>
				<p>This filename is passed to the python code as input.</p>
				<p>The steganographic image for this profile is being searched in the secret folder.</p>

      </div>
      <div class="modal-footer">
        <button onclick="next()" type="button" class="btn btn-primary">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div style="width:600px; margin:auto;" class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validating user...</h5>
        <button style="display: none;" id="closemodal2" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>The steganographic image is found and is displayed below:</p>
			<img width="200" height="200" src="steg/<?php echo $useremail;  ?>">
			<p>The 'retrieve' function will extract the password hash from the image.</p>
      </div>
      <div class="modal-footer">
        <button onclick="nextnext()" type="button" class="btn btn-primary">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div style="width:600px; margin:auto;" class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validating user...</h5>
        <button style="display: none;" id="closemodal3" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<p>The hash retrieved from the steganographic image is: <?php echo $hash;  ?>.</p>
			<p>The hash is passed to the 'PASSWORD_VERIFY' function to validate the user.</p>
      </div>
      <div class="modal-footer">
        <button onclick="nextnextnext()" type="button" class="btn btn-primary">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div style="width:600px; margin:auto;" class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validating user...</h5>
      </div>
      <div class="modal-body">
			<p>The user has been validated and successfully logged in.</p>
			<p>Close this box to access the profile page.</p>
      </div>
      <div class="modal-footer">
        <button id="validated" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







</body>

<script>
$(function(){
   $('#modal').click();
});

function next(){

		 $('#closemodal1').click();
		 $('#modal2').click();
}

function nextnext(){

		 $('#closemodal2').click();
		 $('#modal3').click();
}

function nextnextnext(){

		 $('#closemodal3').click();
		 $('#modal4').click();
}

$("#validated").click(function(){
	  $("#content").removeClass("hide");
    $("#content").addClass("show");
});

</script>


</html>

<!-- Mark Otto, a. (2018). Modal. [online] Getbootstrap.com. Available at: https://getbootstrap.com/docs/4.1/components/modal/ [Accessed 13 Aug. 2018].>
