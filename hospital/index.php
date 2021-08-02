<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['submit']))
{
$name=$_SESSION['hlogin'];
$status=$_POST['status'];
$sql="update hospital set beds=:status where h_user='$name'";
$query = $dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$msg="updted successfully";

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
	
	<title>HOSPITAL PORTAL</title>
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

<body style="background-color: red;">
    <style>
        .dot {
  height: 45px;
  width: 50px;
  background-color: red;
  border-radius: 50%;
  display: inline-block;
	}
	.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	}    
	th{text-align: center;
		color: whitesmoke;}
    </style>
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    	<h1 style="text-align: center; color:white">AMBULANCE MANAGEMENT SYSTEM</h1>
    	<div style="background-color: white; width: 96%; height: 600px; padding: 40px; margin: 30px; border-radius: 50px;">
			<?php   if(strlen($_SESSION['hlogin'])==0)
	        {	
            ?>
            <div style="text-align:right;" ><button style="background-color: red; color:white; width: 100px; height:40px" onclick="window.location.href='http://localhost/ambulance/hospital/login.php';">LOG IN</button></div>
            <?php }
                else{ 
                    $name=$_SESSION['hlogin'];
                    ?>
                        <div style="text-align:right;" ><button style="background-color: red; color:white; width: 100px; height:40px" onclick="window.location.href='http://localhost/ambulance/hospital/logout.php';"><em class="fa fa-sign-out"></em> LOG OUT</button></div>
                        <h3 style="text-transform: uppercase;"><?php echo "WELCOME  $name"; ?></h3>
                        <h5><em>YOUR DETAILS</em></h5><br>
                        <table id="zctb" class="display table table-bordered" cellspacing="0" width="100%" >
							<caption>Hospital</caption>
                            <thead style="background-color: #e19191;">
								<tr>
	    							<th id="1">#</th>
									<th id="2">Hospital name</th>
									<th id="3">Contact</th>
									<th id="4">Area</th>
									<th id="5">City</th>
									<th id="6">State</th>
									<th id="7">Country</th>
									<th id="8">PIN</th>
                                    <th id="9">Beds available</th>
								</tr>
							</thead>
							<tbody style="height: 100px; ">
                                <?php $sql = "SELECT * from  hospital where h_user='$name'";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {				?>	
								<tr>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($cnt);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->hospital_name);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->h_contact);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->area);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->city);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->state);?></td>
                                    <td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->country);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->pin);?></td>
									<td style="text-align: center;vertical-align:middle ;"><?php echo htmlentities($result->beds);?></td>
								</tr>
								<?php $cnt=$cnt+1; 
                                    }
                                    } ?>
							</tbody>
						</table>        
							<div class="form-group">
								<form method="POST">
								<label class="col-sm-2" for="status">BED AVAILABLE UPDATE</label>
								
									<?php $sql="select beds from hospital where h_user='$name'";
										$query=$dbh->prepare($sql);
										$query->execute();
										$stats=$query->fetchAll((PDO::FETCH_OBJ)); 
										foreach($stats as $stat){?>
										
                                    <input class="form-control col-sm-4" type="number" style="width: 200px;" value="<?php echo htmlentities($stat->beds);?>" name="status" id="status" required>
											<?php } ?>
                                    </input>
									<button class="btn btn-primary" name="submit" type="submit" >UPDATE</button>
									<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								</form>
							</div>
						<?php } ?>
											
                <footer><button style="position: absolute; top: 10px; left:20px; background-color:white; border-radius: 10px; border:none;" onclick="window.location.href='http://localhost/ambulance';"><em class="fa fa-arrow-left"></em>BACK TO MAIN</button><div style="position:absolute; bottom: 80px; right:70px"><a href="tel:admin"><div class="dot" style="text-align: center;" title="call admin"><em class="fa fa-phone fa-3x" style="color: white;"></em></div></a></div></footer>
		</div>

	<!-- Loading Scripts -->
</body>
</html>