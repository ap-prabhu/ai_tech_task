<style type="text/css">	
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #ccc;
  height: 250px;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: #ddd;
}
</style>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


<?php 
error_reporting(0);
include("inc/dbConnect.php");

$ses_user_creation_id = $_SESSION['user_creation_id'];
$ses_user_identity = $_SESSION['user_identity'];
$ses_name = $_SESSION['name'];

?>
<title>AI TECH</title>

</head>

<body style="padding-left: 35px;">
<?php 
$sql = "SELECT * FROM user_creation WHERE user_creation_id='$ses_user_creation_id' AND delete_status!='1'";
$select_usercreation=$pdo_conn->prepare($sql);
$exe = $select_usercreation->execute();
$checklogin = $select_usercreation->fetchAll();
// if(count($checklogin) > 0) {	
if(isset($ses_user_creation_id) && count($checklogin)>0) { ?>
		<br>
	<div class="navbar">
		<a href="index.php?file=user_creation/list" style="background-color: #f1ee8f;"><i class="icon-stack" ></i>User Creation</a>
		<a href="#" onclick="logout()" style="background-color: #eacfac;"><i class="feather icon-log-out"></i> Logout(<?php echo $_SESSION['name']; ?>)</a>
	</div>
 
	<div class="row">
	<div class="col-lg-12">
	<?php
		$fileroot = $_GET['file'];
		$filepath = explode('/',$fileroot);
		$foldername = $filepath[0];
		$filename = $filepath[1];
		if($fileroot){ 
			include $foldername.'/'.$filename.'.php';
		} else { ?>
			<div class="row" style="padding-top: 55px;"> 
				<div class="col-lg-5"></div>
				<div style="font-size: 39px;">Welcome </div>
			</div>
	<?php }
		  ?>
	</div>
	</div>
<?php 
} else { 
	include 'login.php'; 
} ?>
</body>
</html>

<script type="text/javascript">
function logout()
{ 
	if (confirm('Are you sure you want Log Out?')) {
	    jQuery.ajax({
	      type: "POST",
	      url: "inc/login_action.php",
	      data: { action : 'Log_Out' },
	      success: function(msg){ 
	        console.log(msg);
	        if(msg == '1'){
	            window.location.href="index.php";
	        }else{
	            alert('Logout Failed');
	        }
	      }
	  	});
	}
}
</script>