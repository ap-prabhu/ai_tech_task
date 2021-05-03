 <section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-3"></div>

<div class="col-md-6" id="user_div">

<form class="md-float-material form-material" method="POST" id="login_form">
<br>
<br>
<br>
<div class="auth-box card">
<div class="card-block">
<div class="row">
<div class="col-md-8">
  <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="admin_div('user')" >ADMIN PANEL</button>
<h3 class="text-center txt-primary">User Log In</h3>
</div>
</div>
 
<div class="form-group form-primary">
  <div class="col-md-8">
  <label class="float-label">Mobile No / Email</label>
  <input type="text" name="login_user" id="login_user" class="form-control" required="">
  <span class="form-bar"></span>
  </div>
</div>
  
<div class="form-group form-primary">
  <div class="col-md-8">  
  <label class="float-label">Password</label>
  <input type="password" name="login_password" id="login_password" class="form-control" required="">
  <span class="form-bar"></span>
  </div>
</div>

<div class="row">
<div class="col-md-4">
<button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="user_login()">LOGIN</button>
</div>
<div class="col-md-4">
  <!-- onclick="sign_up()" -->
<button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="document.getElementById('id01').style.display='block'" >SIGN UP</button>
</div>

</div>
</div>
</div>
</form>

</div>
<div class="col-md-6" id="admin_div" style="display: none;">

<form class="md-float-material form-material" method="POST" id="admin_login_form">
<br>
<br>
<br>
<div class="auth-box card">
<div class="card-block">
<div class="row">
<div class="col-md-8">
  <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="admin_div('admin')" >USER PANEL</button>
<h3 class="text-center txt-primary">Admin Log In</h3>
</div>
</div>
 
<div class="form-group form-primary">
  <div class="col-md-8">
  <label class="float-label">Mobile No / Email</label>
  <input type="text" name="admin_name" id="admin_name" class="form-control" required="">
  <span class="form-bar"></span>
  </div>
</div>
  
<div class="form-group form-primary" style="display: none;" id="admin_password_div">
  <div class="col-md-8">  
  <label class="float-label">Password</label>
  <input type="password" name="admin_password" id="admin_password" class="form-control" required="">
  <span class="form-bar"></span>
  </div>
</div>

<div class="row">
<div class="col-md-4"  >
<button type="button" id="send_password_btn_div" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="admin_send_password()">Send Password</button>
 
<button type="button"  style="display: none;" id="admin_login_btn_div" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="admin_login()" >LOG IN</button>
</div>

</div>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
<!-- sign up MODEL -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content was-validated" name="user_creation_pop" id="user_creation_pop">
    <div class="container">
      <h1>Sign Up</h1>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name"><b>Name</b><sup>*</sup></label>
            <input type="text" placeholder="Name" name="name" id="name" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email"><b>Email</b><sup>*</sup></label>
            <input type="text" placeholder="Email" name="email" id="email"  class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="mobile_no"><b>Mobile No</b><sup>*</sup></label>
            <input type="text" placeholder="Mobile No" name="mobile_no" id="mobile_no" class="form-control" required maxlength="10" onkeypress="if((event.keyCode < 46)||(event.keyCode > 57)) event.returnValue = false;">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="gender"><b>Gender</b><sup>*</sup></label>
            <select class="form-control" name="gender" id="gender" class="form-control" required>
              <option value="" >-Select Gender-</option>
              <option value="male" <?php if($gender=='male'){ echo "selected";} ?>>Male</option>
              <option value="female" <?php if($gender=='female'){ echo "selected";} ?>>Female</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="address"><b>Address</b><sup>*</sup></label>
            <textarea placeholder="Address" name="address" id="address" class="form-control" required></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="sign_password"><b>Password</b><sup>*</sup></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="confirm_password"><b>Confirm Password</b><sup>*</sup></label>
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" class="signupbtn" onclick="sign_up()">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<!-- MODEL END -->
<script>
function admin_div(current)
{    
  if(current=='admin') {
    $('#admin_div').hide();
    $('#user_div').show();
  } else {
    $('#user_div').hide();
    $('#admin_div').show();
  }
}
function admin_send_password()
{    
  var admin_name=$('#admin_name').val();  
  
  if(admin_name!='')
  {
    jQuery.ajax({
      type: "POST",
      url: "inc/login_action.php",
      data: { admin_name:admin_name, action:'Admin_Send_Password' },
      success: function(msg){ 
        console.log(msg);
        if(msg == 'success'){
            $('#send_password_btn_div').hide();
            $('#admin_password_div').show();
            $('#admin_login_btn_div').show();
        }else if(msg == 'failed'){
            alert('Login Failed');
        }
      }});
  }else{
    alert('Please fill Admin Mobile No OR Email!');
  }    
}

function admin_login()
{	
  var admin_name=$('#admin_name').val();  
	var admin_password=$('#admin_password').val();	
	
	if(admin_name!='' && admin_password!='')
	{
		jQuery.ajax({
			type: "POST",
			url: "inc/login_action.php",
			data: { admin_name : admin_name,admin_password : admin_password, action : 'Check_Admin_Login' },
			success: function(msg){ 
				console.log(msg);
				if(msg == 'success'){
				    window.location.href="index.php";
				}else if(msg == 'failed'){
				    alert('Login Failed');
				}
			}});
	}else{
		alert('Please fill Login Details!');
	}	
}

function user_login()
{ 
  var login_user=$('#login_user').val();  
  var login_password=$('#login_password').val();  
  
  if(login_user!='' && login_password!='')
  {
    jQuery.ajax({
      type: "POST",
      url: "inc/login_action.php",
      data: { login_user : login_user,login_password : login_password, action : 'Check_User_Login' },
      success: function(msg){ 
        console.log(msg);
        if(msg == 'success'){
            window.location.href="index.php";
        }else if(msg == 'failed'){
            alert('Login Failed');
        }
      }});
  }else{
    alert('Please fill Login Details!');
  } 
}
//////////////sign_up modal////////////////////////////
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  
function sign_up()
{ 
  var forms = document.getElementsByClassName('was-validated');
  var validation = Array.prototype.filter.call(forms, function(form) {
    if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }else{
      format=$("#user_creation_pop").serialize()+"&action=User_Add";
      //alert(format);
      var password=$('#password').val();  
      var confirm_password=$('#confirm_password').val();  
      if(password!=confirm_password){
        alert('Please fill Same Password!');
      } else {
        jQuery.ajax({
            type: "POST",
            url: "inc/login_action.php",
            data: format,
            success: function(msg){ 
              console.log(msg);
              if(msg==1){
                alert('Successfully Created!');
                  window.location.href="index.php";
              } else if(msg==3){
                alert('User Email or Mobile No Already Exists!');
              }
            }
          });
      } 
    }
  }); 
} 
//////////////sign_up modal////////////////////////////
</script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 1px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
button:hover {
  opacity:1;
}
/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
/* Add padding to container elements */
.container {
  padding: 10px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 0px;
}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 3% auto 3% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}
/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 15px;
} 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 1px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}
.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}
/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>