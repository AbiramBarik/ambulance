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
    $dname=$_POST['drivername'];
    $password=$_POST['password'];
    $did=$_POST['driverid'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $vid=$_POST['vid'];
    $contact=$_POST['contact'];
    $assist=$_POST['assist']; 
    $sql="INSERT INTO  driver(d_id,driver_name,Password,city,state,country,v_id,assist_name,contact) VALUES(:did,:dname,:password,:city,:state,:country,:vid,:assist,:contact)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':did',$did,PDO::PARAM_STR);
    $query->bindParam(':dname',$dname,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':state',$state,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':vid',$vid,PDO::PARAM_STR);
    $query->bindParam(':assist',$assist,PDO::PARAM_STR);
    $query->bindParam(':contact',$contact,PDO::PARAM_STR);
    $query->execute();
	$msg= 'Driver account created successfully';
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
	
	<title>Admin Management Portal |Add driver</title>

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
    if(document.adddriver.password.value!= document.adddriver.confirmpassword.value)
    {
    alert("Password and Confirm Password Field do not match  !!");
    document.adddriver.confirmpassword.focus();
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
                        <h2 class="page-title">Add new health worker</h2>
                        <div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields <em>(*all field are necessaary)</em></div>
									<div class="panel-body">
										<form method="post" name="adddriver" class="form-horizontal" onSubmit="return valid();"><!--chngpwd-->
										
				                            <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											
                                            <!--driver name-->
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Driver name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="drivername" id="drivername" required>
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

											<!--driver id-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Driver id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="driverid" id="driverid" required>
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

											<!--vehicle id-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Driver Managed vehicle id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="vid" id="vid" required>
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

											<!--assistant staff-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Support staff</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="assist" id="assist" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">ADD DRIVER</button>
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