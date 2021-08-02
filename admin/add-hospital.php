<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
   
    if(isset($_POST['submit']))
    {
    $huser=$_POST['huser'];
    $password=$_POST['password'];
    $hid=$_POST['hid'];
    $hname=$_POST['hname'];
    $area=$_POST['area'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pin=$_POST['pin'];
    $contact=$_POST['contact'];
    $beds=$_POST['beds']; 
    $sql="INSERT INTO  hospital(h_id,h_user,Password,hospital_name,h_contact,area,city,state,country,pin,beds) VALUES(:hid,:huser,:password,:hname,:contact,:area,:city,:state,:country,:pin,:beds)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':hid',$hid,PDO::PARAM_STR);
    $query->bindParam(':huser',$huser,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':hname',$hname,PDO::PARAM_STR);
	$query->bindParam(':contact',$contact,PDO::PARAM_STR);
	$query->bindParam(':area',$area,PDO::PARAM_STR);
	$query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':state',$state,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':pin',$pin,PDO::PARAM_STR);
    $query->bindParam(':beds',$beds,PDO::PARAM_INT);
    $query->execute();
	$msg= 'Hospital account created successfully';
	}

?>
<!--DESIGN-->
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Admin Management Portal |Add Hospital</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
        .succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
  </style>
    <script type="text/javascript">
    function valid()
    {
    if(document.addhospital.password.value!= document.addhospital.confirmpassword.value)
    {
    alert("Password and Confirm Password Field do not match  !!");
    document.addhospital.confirmpassword.focus();
    return false;
    }
    return true;
    }
    </script>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
                        <h2 class="page-title">Add new life saver</h2>
                        <div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields<em>(*all fields are necessary)</em></div>
									<div class="panel-body">
										<form method="post" name="addhospital" class="form-horizontal" onSubmit="return valid();">
										
				                            <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											
                                            <!--hospital username-->
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Hospital Username</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="huser" id="huser" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
                                            <!--password-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
                                            
                                            <!--confirm password-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--hospital id-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Hospital id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="hid" id="hid" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--hospital name-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Hospital name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="hname" id="hname" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
                                            <!--area-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Area</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="area" id="area" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

                                            <!--city-->
											<div class="form-group">
												<label class="col-sm-4 control-label">City</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="city" id="city" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--state-->
											<div class="form-group">
												<label class="col-sm-4 control-label">State</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="state" id="state" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--country-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Country</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="country" id="country" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--pin-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Pin code</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="pin" id="pin" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

                                            <!--contact-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Contact</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="contact" id="contact" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--beds-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Beds available</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" name="beds" id="beds" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">ADD HOSPITAL</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>