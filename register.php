<?php 
require_once 'php_action/db_connect.php';




$errors = array();
$errors = [];

    if($_POST) {

    $username        = $_POST['username'];
    $password        = $_POST['password']; 
    $email           = $_POST['email'];    
    $companyid        =        $_POST['companyid'];
    $companyname      =        $_POST['companyname'];
    $companyaddress   =        $_POST['companyaddress'];
    $licenceno        =        $_POST['licenceno'];
    $phoneno          =        $_POST['phoneno'];

	if(empty($companyid) || empty($companyname) || empty($companyaddress) || empty($licenceno) || empty($phoneno) || empty( $username) || empty($password)|| empty($email)) {
        if($password  == "") {
			$errors[] = "password is required";
		}
        if($username == "") {
			$errors[] = "username is required";
		}
        if($companyid == "") {
			$errors[] = "companyid is required";
		} 
        if($companyname==""){
            $errors[]="Company name required";
        }
        if($companyaddress==""){
            $errors[]="Company address required";
        }
        if($licenceno==""){
            $errors[]="licence no is required";
        }
        if($phoneno==""){
            $errors[]="phone no is reuired";
        }
    }else{
        $sql1 = "SELECT * FROM users WHERE username = '$username'";
        $result = $connect->query($sql1);
        if($result->num_rows > 0){
                $errors[]="username already exit";

        }else{
    
        $sql = "INSERT INTO users (username,password,email,companyid,companyname,companyaddress,licenceno,phoneno)
        VALUES ('$username','$password','$email','$companyid','$companyname','$companyaddress','$licenceno','$phoneno')";
       if($connect->query($sql) === TRUE) {
        
        $errors['messages'] = "Successfully Added";
       }
        else {
            
            $errors['messages'] = "Error while adding the members";
        }
    }
    }
     }
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>


    <body>
      
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center lg">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    <div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>
                  
                        
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="registerform" method="post">
                            <div class="row ">
                            <div class="form-group col-lg-6">
                                    <label>Username</label>
                                    <input type="text" value="" id="username" class="form-control" name="username">
                                    <span class="help-block small">Your unique username to app</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Company ID</label>
                                    <input type="text" value="" id="companyid" class="form-control" name="companyid">
                                    <span class="help-block small">Your unique companyno to app</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" value="" id="password" class="form-control" name="password">
                                    <span class="help-block small">Your hard to guess password</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" value="" id="repeatpassword" class="form-control" name="repeatpassword">
                                    <span class="help-block small">Please repeat your pasword</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="text" value="" id="email" class="form-control" name="email">
                                    <span class="help-block small">Your address email to contact</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Company Name</label>
                                    <input type="text" value="" id="companyname" class="form-control" name="companyname">
                                    <span class="help-block small">Your Company Name</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Company Address</label>
                                    <input type="text" value="" id="companyaddress" class="form-control" name="companyaddress">
                                    <span class="help-block small">Your Company Address</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Licence #</label>
                                    <input type="text" value="" id="licenceno" class="form-control" name="licenceno">
                                    <span class="help-block small">Your Company Licence Number</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone #</label>
                                    <input type="text" value="" id="phoneno" class="form-control" name="phoneno">
                                    <span class="help-block small">Your Company Phone Number</span>
                                </div>
                            </div>
                            <div>
                            <button type="submit" name="register" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Register</button>
                            <br>
                            
                            <a href="index.php">Click To Login</a>
                                
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'includes/footer.php'; ?>