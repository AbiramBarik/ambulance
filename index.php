<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<title> Ambulance Management sysstem</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <h1>AMBULANCE MANAGEMENT SYSTEM</h1>
    <div>
        <table>
            <tr>
                <td style="border-right: 5px solid red;"><em class="fa fa-user fa-5x" style="color: orange;"></em><br><a href="user.php"><button style="background-color: orange;">Continue as user</button></a></td>
                <td style="vertical-align: baseline;">
                    <table>
                    <tr><td><em class="fa fa-user-secret fa-5x" style="color: black;"></em><br><button style="background-color: black;" onclick="window.location.href='http://localhost/ambulance/admin';">Admin Log in</button></td></tr>
                    <tr><td><em class="fa fa-ambulance fa-5x" style="color: blue;"></em><br><button style="background-color: blue;" onclick="window.location.href='http://localhost/ambulance/driver';">Driver log in</button></td></tr>
                    <tr><td><em class="fa fa-h-square fa-5x" style="color: red;"></em><br><button onclick="window.location.href='http://localhost/ambulance/hospital';">Hospital log in</button></td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>