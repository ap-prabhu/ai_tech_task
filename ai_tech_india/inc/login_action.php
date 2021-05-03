<?php 
session_start();
require_once('../inc/dbConnect.php');

if($_POST['action']!='')
{
	$action = $_POST['action'];
}

switch ($action) {

	case 'User_Add':	
		$result='';$pdo_statement='';
		$msg =0 ;
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$mobile_no  = $_POST['mobile_no'];
		$gender     = $_POST['gender'];
		$address    = $_POST['address'];
		$password     = $_POST['password'];
		$user_identity ='user';

		$select_user_creation=$pdo_conn->prepare("SELECT COUNT(user_creation_id) FROM user_creation WHERE email = '".$email."' OR mobile_no = '".$mobile_no."' AND delete_status!='1' ");
		$select_user_creation->execute();
		$user_creation = $select_user_creation->fetchAll();
		if($user_creation[0]['COUNT(user_creation_id)']==0)
		{
			$sql = "INSERT INTO user_creation (user_identity,name,email,mobile_no,gender,address,password) VALUES (:user_identity,:name,:email,:mobile_no,:gender,:address,:password)";
			$pdo_statement = $pdo_conn->prepare($sql);
			$result = $pdo_statement->execute(array(':user_identity'=>$user_identity,':name'=>$name,':email'=>$email,':mobile_no'=>$mobile_no,':gender'=>$gender,':address'=>$address,':password'=>$password));
			$user_creation_id = $pdo_conn->lastInsertId();
			if($result==true) {
				$msg =1;
			}
		} else {
			$msg =3;
		}
		echo $msg;
	break;

	case 'Check_User_Login':		
		$sql = ''; $msg = ''; $error = ''; 
		$login_user = $_POST['login_user'];
		$login_password = $_POST['login_password'];

		$sql = "SELECT * FROM user_creation WHERE (mobile_no='$login_user' OR email='$login_user') AND user_identity='user' AND password='$login_password' AND delete_status!='1'";
		$select_usercreation=$pdo_conn->prepare($sql);
		$exe = $select_usercreation->execute();
		
		$checklogin = $select_usercreation->fetchAll();
		
		if(count($checklogin) > 0) 
		{	
			foreach($checklogin as $value) 
			{
				$_SESSION['user_creation_id'] = $value['user_creation_id'];
				$_SESSION['user_identity'] = $value['user_identity'];
				$_SESSION['name'] = $value['name'];
			} 
			echo "success";
		} else {
			echo "failed";
		}	  
	break;

	case 'Log_Out':
		//session_start();		
		unset($_SESSION['user_creation_id']);
		unset($_SESSION['user_identity']);
		unset($_SESSION['name']);
		session_regenerate_id();
		session_destroy();
		echo "1";
	break;

	case 'Admin_Send_Password':
		$sql = ''; $msg = ''; $error = ''; 
		$admin_name = $_POST['admin_name'];

		$sql = "SELECT * FROM user_creation WHERE (mobile_no='$admin_name' OR email='$admin_name') AND user_identity='admin' AND delete_status!='1' LIMIT 1";
		$select_usercreation=$pdo_conn->prepare($sql);
		$exe = $select_usercreation->execute();
		
		$checklogin = $select_usercreation->fetchAll();
		
		if(count($checklogin) > 0) 
		{	
			$user_creation_id = $checklogin[0]['user_creation_id'];
			$email = $checklogin[0]['email'];
			$user_identity = $checklogin[0]['user_identity'];
			$name = $checklogin[0]['name'];
			$otp =  uniqid();
			$to = $email;

			$pdo_statement=$pdo_conn->prepare("UPDATE user_creation SET password='".$otp."',password_status='0' WHERE user_creation_id='".$user_creation_id."'");
			$result = $pdo_statement->execute();
			if($result==true) {
				$subject = "AI Admin Panel OTP";
				$txt = "One Time Password for your Admin panel is :-".$otp."";
				$headers = "From: ap.prabhu85@gmail.com" . "\r\n";

				mail($to,$subject,$txt,$headers);

				echo "success";	 
			} 
		} else {
			echo "failed";
		}	  
	break;

	case 'Check_Admin_Login':
		$sql = ''; $msg = ''; $error = ''; 
		$admin_name = $_POST['admin_name'];
		$admin_password = $_POST['admin_password'];

		$sql = "SELECT * FROM user_creation WHERE (mobile_no='$admin_name' OR email='$admin_name') AND password='$admin_password' AND password_status='0' AND user_identity='admin' AND delete_status!='1'";
		$select_usercreation=$pdo_conn->prepare($sql);
		$exe = $select_usercreation->execute();
		
		$checklogin = $select_usercreation->fetchAll();
		
		if(count($checklogin) > 0) 
		{	
			foreach($checklogin as $value) 
			{
				$_SESSION['user_creation_id'] = $value['user_creation_id'];
				$_SESSION['user_identity'] = $value['user_identity'];
				$_SESSION['name'] = $value['name'];
				$pdo_statement=$pdo_conn->prepare("UPDATE user_creation SET password_status=1 WHERE user_creation_id='".$value['user_creation_id']."'");
				$result = $pdo_statement->execute();
			} 
			echo "success";
		} else {
			echo "failed";
		}	  
	break;

}
?>