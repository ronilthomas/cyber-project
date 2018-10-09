<?php
session_start();
if(isset($_SESSION['email']))
{
			$hash = $_SESSION['hash'];
			$useremail = $_SESSION['email'];

} else
{
	echo "error";
	exit();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Completed Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="hide" id="content">
  	<div class="float-right" style="margin: 50px;">
      <button class="btn btn-primary btn-lg" onclick = "window.location.href='login.php'">Login</button>
    </div>

  	<h3 style="text-align: center; margin-left: 150px;">The user email <?php echo $useremail; ?> has been successfully registered!</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Registering user...</h5>
        <button style="display: none;" id="closemodal1" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<p>The plaintext password entered is converted into a hash value by the 'PASSWORD_DEFAULT' function.</p>
				<p>The hash value is: '<?php echo $hash;  ?>'.</p>

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
        <h5 class="modal-title" id="exampleModalLabel">Registering user...</h5>
        <button style="display: none;" id="closemodal2" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>The sample image used for steganography is shown below:</p>
			<img width="200" height="200" src="google.png">
			<p>The 'hide' function will embed the hash into the image.</p>
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
        <h5 class="modal-title" id="exampleModalLabel">Registering user...</h5>
        <button style="display: none;" id="closemodal3" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<p>The steganography process is complete!</p>
      <p>The steganographic image is named as '<?php echo $useremail;  ?>.png' and saved in a secure location.</p>
      <p>The generated steganographic image is shown below:</p>
			<img width="200" height="200" src="steg/<?php echo $useremail;  ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Registering user...</h5>
      </div>
      <div class="modal-body">
			<p>The user email <?php echo $useremail;  ?> has been successfully registered.</p>
			<p>Close this box to exit and login.</p>
      <?php $_SESSION = array(); session_destroy();  ?>
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
