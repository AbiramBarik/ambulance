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
    $area=$_POST['area'];
    $sql="INSERT INTO area(v_id,area) VALUES(:vid,:area)";
    $query = $dbh->prepare($sql);
	$query->bindParam(':vid',$vid,PDO::PARAM_STR);
    $query->bindParam(':area',$area,PDO::PARAM_STR);
    $query->execute();
	$msg= 'Area details added successfully';
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
	
	<title>Admin Management Portal |Add Area</title>

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
                        <h2 class="page-title">Add area</h2>
                        <div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields<em>(*all fields are necessary)</em></div>
									<div class="panel-body">
										<form method="post" name="addhospital" class="form-horizontal" onSubmit="return valid();">
										    
											<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
										
											<!--vehicle id-->
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Vehicle id <em>(check if driver assigned for the vehicle id)</em></label>
												<div class="col-sm-8">

													<select type="text" class="form-control" name="vid" id="vid" style="text-transform: uppercase;" required>
														<option></option>
														<?php $sql = "SELECT v_id from vehicle where v_id in (select v_id from driver)";
                                           				$query = $dbh -> prepare($sql);
                                            			$query->execute();
                                            			$results=$query->fetchAll(PDO::FETCH_OBJ);
                                            			if($query->rowCount() > 0)
                                            			{
                                            			foreach($results as $result)
                                            			{				?>
														<option><?php echo htmlentities($result->v_id) ?></option>
														<?php } 
														} ?>
													</select>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
                                            <!--vehicle number-->
											<div class="form-group">
												<label class="col-sm-4 control-label">Area covered</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="area" id="area" style="text-transform: uppercase;" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="submit" type="submit">ADD AREA</button>
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