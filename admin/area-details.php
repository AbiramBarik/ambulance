<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
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
	
	<title>Admin Management Portal |Area Managed</title>

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
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Ambulance & Managing Areas</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Areas</div>
							<div class="panel-body">
							    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" >
									<caption>Ambulance and managing areas</caption>
                                    <thead>
										<tr>
										<th id="1">#</th>
										<th id="2">vehicle id</th>
										<th id="3">Area</th>
										<th id="4">Vehicle_no</th>
										<th id="5">Status</th>
										<th id="6">Driver name</th>
                                        <th id="7">Driver id</th>
                                        <th id="8">Contact</th>
										</tr>
									</thead>
									<tbody>
                                        <?php $sql = "SELECT * from area inner join vehicle on area.v_id=vehicle.v_id INNER JOIN driver on vehicle.v_id=driver.v_id";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td style="text-transform: uppercase;"><?php echo htmlentities($result->v_id);?></td>
											<td style="text-transform: uppercase;"><?php echo htmlentities($result->area);?></td>
											<td style="text-transform: uppercase;"><?php echo htmlentities($result->v_no);?></td>
	                                        <td><?php echo htmlentities($result->action);?></td>
											<td><?php echo htmlentities($result->driver_name);?></td>
											<td><?php echo htmlentities($result->d_id);?></td>
                                            <td><?php echo htmlentities($result->contact);?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>
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