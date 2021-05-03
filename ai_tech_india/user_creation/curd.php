<?php
session_start();
error_reporting(0);
include ('../inc/dbConnect.php');

$ses_user_creation_id = $_SESSION['user_creation_id'];
$ses_user_identity = $_SESSION['user_identity'];

$sql = "SELECT * FROM user_creation WHERE user_creation_id='$ses_user_creation_id' AND delete_status!='1'";
$select_usercreation=$pdo_conn->prepare($sql);
$exe = $select_usercreation->execute();
$checklogin = $select_usercreation->fetchAll();
if(count($checklogin) > 0) {	

if($_POST['action']!='')
{
	$action = $_POST['action'];
}

switch ($action) {

	case 'user_creation_table':	
		$totalData = 0;
		$totalval=0;
		$totalcount=0;
		$data = array();
		$length=$_POST['length'];
    	$start=$_POST['start'];
		$draw = $_POST['draw'];
		$search    	 = $_POST['search']['value'];
	
		$limit = "limit  $start,$length";
	
		if($length == '-1'){
			$limit = "";
		}

		$search_condition = "";

		if ($search) {
			$search_condition = " AND (name LIKE '%".$search."%' OR email LIKE '%".$search."%' OR mobile_no LIKE '%".$search."%') ";
		}	
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM user_creation WHERE delete_status!='1' ".$search_condition." ORDER BY user_creation_id DESC $limit";
		$prepare = $pdo_conn->prepare($sql);
		$exc = $prepare->execute();
		if($exc == TRUE){
			$totalcount = found_rows_count();
			$list = $prepare->fetchAll();
			foreach($list as $value){
				$nestedData = array();
				$start++;		
				
				$nestedData[] = '<td>'.$start.'</td>';
				$nestedData[] = '<td>'.$value['name'].'</td>';
				$nestedData[] = '<td>'.$value['email'].'</td>';
				$nestedData[] = '<td>'.$value['mobile_no'].'</td>';
				
				$btn = '';

			
				if($ses_user_identity=='admin' || $ses_user_creation_id==$value['user_creation_id'])
				{
			    			
			    	$btn.='<a href="index.php?file=user_creation/form&user_creation_id='.$value['user_creation_id'].' " title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp';
			    	if($value['user_identity']=='user'){
						$btn.='<a href="#" onclick="del('.$value['user_creation_id'].' )" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
					}
				}
				$nestedData[] = '<td>'.$btn.'</td>';
				$data[] = $nestedData;
			}
		}
	
		$totalData =$totalcount[0]; 
		$json_data = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $data,
			"totalval" => $totalval,
			"sql"	=> $sql			
        ); 
		
    	echo json_encode($json_data);
    break;    

	case 'Add':	
		$result='';$pdo_statement='';
		$msg =0 ;
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$mobile_no  = $_POST['mobile_no'];
		$gender     = $_POST['gender'];
		$address    = $_POST['address'];
		$password     = $_POST['password'];
		$user_identity ='user';

		$select_user_creation=$pdo_conn->prepare("SELECT COUNT(user_creation_id) FROM user_creation WHERE email = '".$email."' AND mobile_no = '".$mobile_no."' AND delete_status!='1' ");
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

/************************************* UPDATE ********************************************/
 	case "Update";

		$rate_delete_result = '';
		$rate_up_result = '';$msg=0;
		
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$mobile_no  = $_POST['mobile_no'];
		$gender     = $_POST['gender'];
		$address    = $_POST['address'];
		$password     = $_POST['password'];
		$user_identity ='user';

		$select_user_creation=$pdo_conn->prepare("SELECT COUNT(user_creation_id) FROM user_creation WHERE mobile_no = '".$_POST['mobile_no']."' AND user_creation_id!='".$_POST['user_creation_id']."' AND delete_status !='1' ");
		$select_user_creation->execute();
		$user_creation = $select_user_creation->fetchAll();
		if($user_creation[0]['COUNT(user_creation_id)']==0)
		{			
			$pdo_statement=$pdo_conn->prepare("UPDATE user_creation SET name='".$_POST['name']."',email='".$_POST['email']."',mobile_no='".$_POST['mobile_no']."',gender='".$_POST['gender']."',address='".$_POST['address']."',password='".$_POST['password']."' WHERE user_creation_id=".$_POST['user_creation_id']);
			$result = $pdo_statement->execute();
			if($result==true) {
				$msg=2;
			} 
		} else {
			$msg=3;
		}
		echo $msg;
	break;

/************************************* DELETE ********************************************/
 	case "Delete";
 		$msg=0;
		 
		$pdo_statement="UPDATE user_creation set delete_status='1' where user_creation_id=".$_POST['user_creation_id'];
		$result=$pdo_conn->exec($pdo_statement);

		if($result==true)
		{
			$msg=1;
		}
		echo $msg;
	break;	

}

} else {
	echo 11;
} 

function found_rows_count(){
	global $pdo_conn;
	$totalcount = 0;
	$sql = "SELECT FOUND_ROWS() as total";
	$prepare = $pdo_conn->prepare($sql);
	$exc = $prepare->execute();
	if($exc == TRUE){
		$list = $prepare->fetchAll();
		$totalcount = $list[0];
	}	
	return $totalcount; 
}