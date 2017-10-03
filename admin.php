<?php
    session_start();
    $_SESSION['username'];
    if (!$_SESSION['username']) {
       header("Location: login.php");
}
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "catering");  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<!--<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Administrator Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="structure.css">
    
</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">                    
                <a href="admin.php" class="simple-text">
                    <i class="ti-home"></i>
                    &nbsp Dashboard
                </a>
            </div>

            <ul class="nav">
            	<li >
                    <a href="clients.php">
                        <i class="ti-user"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li>
                    <a href="cancel.php">
                        <i class="ti-hand-stop"></i>
                        <p>Request Cancel</p>
                    </a>
                </li>
                 <li>
                    <a href="move.php">
                        <i class="ti-hand-stop"></i>
                        <p>Moving Schedule</p>
                    </a>
                </li>
                  <li>
                    <a href="busy_day.php">
                        <i class="ti-target"></i>
                        <p>Busy Days</p>
                    </a>
                </li>
                <li>
                    <a href="mail.php">
                        <i class="ti-stats-down"></i>
                        <p>Mail Me!</p>
                    </a>
                </li>
                 <li>
                    <a href="menu.php">
                        <i class="ti-shopping-cart"></i>
                        <p>Menu and Packages</p>
                    </a>
                </li>

                <li>
                    <a href="upload.php">
                        <i class="ti-camera"></i>
                        <p>Upload Photos</p>
                    </a>
                </li>

                <li>
                    <a href="report.php">
                        <i class="ti-stats-down"></i>
                        <p>Report</p>
                    </a>
                </li>
                 

                </ul>
    	</div>
    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-default">
	            <div class="container-fluid">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar bar1"></span>
	                        <span class="icon-bar bar2"></span>
	                        <span class="icon-bar bar3"></span>
	                    </button>
	                    <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'];?> Administrator</a>
	                </div>
	                <div class="collapse navbar-collapse">
	                    <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="https://www.sandbox.paypal.com" target="_blank" >                       
                                  <i class="ti-comment "></i>
                                    <p>Paypal</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://dashboard.tawk.to" target="_blank" >                       
                                  <i class="ti-comment "></i>
                                    <p>Tawk.To</p>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <i class="ti-settings"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>
			       	 	<div class="content">
			            	<div class="container-fluid">
			                	<div class="row">

<?php 

$query = mysqli_query($con, "SELECT * FROM accounts WHERE username = '$_SESSION[username]'");
$show = mysqli_fetch_array($query);
?>

<img src='accounts_pic/<?php echo $show['image']; ?>' style='height:200px; width:200px; border-radius: 100px; float: left;'>
<table style='float:left; margin-left:30px;'>
<tr>
<td>
&nbsp
</td>
</tr>
<tr>
<td>
&nbsp
</td>
</tr>
<tr>
<td style='font-size:30px;'> <b> <?php echo $show['lastname'] . ", " . $show['firstname']; ?> 
</b></td>
</tr>
<tr>
<td style='font-size:25px;'><b><?php echo $show['position']; ?>
</b></td>
</tr>
<tr>
<td style='font-size:20px;'>Username: <?php echo $show['username']; ?>
</td>
</tr>
<tr>
<td style='font-size:20px;'>
<?php
if ($show['mode'] == 1) {
echo "Online&nbsp <img src='icons/online.png' style='height:15px; width:15px;'>";
}
?>
&nbsp
<button style="border-radius:40px;">
<a href="account.php">
<img src="icons/edit.png" style="height:25px; width:25px; ">
</a>
</button>
</td>
</tr>
</table>


<div style="float:right;
    width: 350px;
    height: 900px;
    overflow-x: auto;
    overflow-y: auto;
    white-space: nowrap;">

    <center>
    <?php
    if ($show['position'] == 'Administrator') {
        echo "<a href='account(2).php'>Add Account</a>";
    }

    ?>
    <h3>Active Personnel</h3>
      </center>
<?php
    $sql = "SELECT * FROM accounts WHERE username != '$_SESSION[username]' AND mode = '1'";  

        $result = $con->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                 $x = 1;
                while($row = $result->fetch_assoc()) {
                                
                echo "<label align='center'><img src='accounts_pic/". $row['image'] ."' style='height:60px; width:60px; border-radius:50px'>";
                echo "&nbsp&nbsp <img src='icons/online.png' style='height:15px; width:15px;'>&nbsp&nbsp<font style='font-size:20px; font-weight:normal;'>".$row['lastname']." ".$row['firstname']."</font><br>";
                echo "</label>";
                
                                
                $x++;

                  if($x > 1){
                       
                       echo "<br><br><br>";
                        $x=1;
                        }                                                      
                 }
            } 

            else {
                echo "<center>No one is active.</center>";
            }
?>
</div>


<br><br><br><br><br><br><br><br><br><br><br>


<?php
 $sql="SELECT reference_id FROM client_record ORDER BY reference_id";


if ($result=mysqli_query($con,$sql))
{
// Return the number of rows in result set
$rowcount=mysqli_num_rows($result);
echo "<h3>The website reached ".$rowcount." client(s)</h3><br>";
// Free result set
mysqli_free_result($result);
}   

?>


<!--NEW CLIENTS-->
<div align="center" style="width: 300px;
            height: 300px;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            background-color: white;
            float:left;  margin-left:10px;">
            <h3>New Clients</h3>
<?php
$query = mysqli_query($con, "SELECT * FROM client_record WHERE reservation_status = 'Pending' ORDER BY reference_id DESC");


        echo "<table id='table' >";
        echo "<th> &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp Event Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>";
        echo "<th> Reference ID &nbsp &nbsp &nbsp&nbsp</th>";

       

    while ($row=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td align='center'>". $row["event_date"] . "</td>";
        echo "<td align='left'>". $row["reference_id"] . "</td>";
        echo "</tr>";  
        }
        echo "</table>";
 ?>
 </div>


<!--BUSY DAY SCHEDULE -->
<div align="center" style="width: 300px;
            height: 300px;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            background-color: white;
            float:left;  margin-left:10px;">
            <h3>Busy Day Schedule</h3>
<?php
$query = mysqli_query($con, "SELECT * FROM busy_day ORDER BY busy_date DESC");


        echo "<table id='table' >";
        echo "<th> &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>";
        echo "<th> Description &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp</th>";

       

    while ($row=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td align='center'>". $row["busy_date"] . "</td>";
        echo "<td align='left'>". $row["text"] . "</td>";
        echo "</tr>";  
        }
        echo "</table>";
 ?>
 </div>

<!--CANCEL REQUEST-->
<div align="center" style="width: 300px;
            height: 300px;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            background-color: white;
            float:left; margin-left:10px; margin-top: 10px;">
            <h3>Cancel Request</h3>
<?php
$query = mysqli_query($con, "SELECT * FROM request_cancel WHERE request_status = 'Pending' ORDER BY date_request DESC");


        echo "<table id='table' >";
        echo "<th> &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>";
        echo "<th> Reference ID &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp</th>";

       

    while ($row=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td align='center'>". $row["date_request"] . "</td>";
        echo "<td align='left'>". $row["reference_id"] . "</td>";
        echo "</tr>";  
        }
        echo "</table>";
 ?>
 </div> 

 <!--MOVING REQUEST-->
<div align="center" style="width: 300px;
            height: 300px;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            background-color: white;
            float:left; margin-left:10px;
            margin-top: 10px;">
            <h3>Move Request</h3>
<?php
$query = mysqli_query($con, "SELECT * FROM request_move WHERE request_status = 'Pending' ORDER BY date_made DESC");


        echo "<table id='table' >";
        echo "<th> &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>";
        echo "<th> Reference ID &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp</th>";

       

    while ($row=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td align='center'>". $row["date_request"] . "</td>";
        echo "<td align='left'>". $row["reference_id"] . "</td>";
        echo "</tr>";  
        }
        echo "</table>";
 ?>
 </div>



					                
			                    </div>
			                </div>
			            </div>
	        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
