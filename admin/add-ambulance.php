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
    $vid=$_POST['vid'];
    $vno=$_POST['vno'];
    $lsd=$_POST['lsd'];
    $status=$_POST['status'];
    $sql="INSERT INTO vehicle(v_id,v_no,last_service,action) VALUES(:vid,:vno,:lsd,:status)";
    $query = $dbh->prepare($sql);
	$query->bindParam(':vid',$vid,PDO::PARAM_STR);
    $query->bindParam(':vno',$vno,PDO::PARAM_STR);
    $query->bindParam(':lsd',$lsd,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
	$msg= 'Ambulance data created successfully';
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
	
	<title>Admin Management Portal |Add Ambulance</title>

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
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
                        <h2 class="page-title">Add new ambulance</h2>
                        <div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields<em>(*all fields are necessary)</em></div>
									<div class="panel-body">
										<form method="post" name="addhospital" class="form-horizontal" onSubmit="return valid();">
										    
											<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											
											<!--vehicle id-->
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Vehicle id</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="vid" id="vid" style="text-transform: uppercase;" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
                                            <!--vehicle number-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Vehicle registration number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="vno" id="vno" style="text-transform: uppercase;" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
                                            
                                            <!--last service-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Last service date</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="lsd" id="lsd" style="position: relative;" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<!--status-->
											<div class="form-group">
												<label class="col-sm-4 control-label" for="status">Status</label>
												<div class="col-sm-8">
                                                    <select class="form-control" name="status" id="status" style="text-transform: uppercase;" required>
                                                        <option></option>
														<option value="AVAILABLE">AVAILABLE</option>
                                                        <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                                                        <option value="IN SERVICE">IN SERVICE</option>
                                                    </select>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="submit" type="submit">ADD AMBULANCE</button>
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