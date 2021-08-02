<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
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
	
	<title>USER PORTAL</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="admin/css/style.css">

</head>

<body style="background-color: orange;">
	<style>
		 .dot {
  		height: 45px;
  		width: 50px;
  		background-color: orange;
  		border-radius: 50%;
  		display: inline-block;
	}
	</style>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-align: center;color: white;">AMBULANCE MANAGEMENT SYSTEM</h1>
    	<div style="background-color: white;
    width: 96%;
    height: 600px;
    padding: 50px;
    margin: 30px;
    border-radius: 50px;
    border: red;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 >Search available ambulance</h3>

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
                                        <?php $sql = "SELECT * from area inner join vehicle on area.v_id=vehicle.v_id INNER JOIN driver on vehicle.v_id=driver.v_id Where vehicle.action='available'";
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
											<td><?php echo htmlentities($result->v_id);?></td>
											<td><?php echo htmlentities($result->area);?></td>
											<td><?php echo htmlentities($result->v_no);?></td>
	                                        <td><?php echo htmlentities($result->action);?></td>
											<td><?php echo htmlentities($result->driver_name);?></td>
											<td><?php echo htmlentities($result->d_id);?></td>
                                            <td><a href="tel:<?php echo htmlentities($result->contact);?>"><?php echo htmlentities($result->contact);?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer><button style="position: absolute; top: 10px; left:20px; background-color:white; border-radius: 10px; border:none;" onclick="window.location.href='http://localhost/ambulance';"><em class="fa fa-arrow-left"></em>BACK TO MAIN</button><div style="position:absolute; bottom: 80px; right:70px"><a href="tel:admin"><div class="dot" style="text-align: center;" title="call admin"><em class="fa fa-phone fa-3x" style="color: white;"></em></div></a></div></footer>
		</div>

	<!-- Loading Scripts -->
	<script src="admin/js/jquery.min.js"></script>
	<script src="admin/js/bootstrap-select.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
	<script src="admin/js/jquery.dataTables.min.js"></script>
	<script src="admin/js/dataTables.bootstrap.min.js"></script>
	<script src="admin/js/Chart.min.js"></script>
	<script src="admin/js/fileinput.js"></script>
	<script src="admin/js/chartData.js"></script>
	<script src="admin/js/main.js"></script>
</body>
</html>
