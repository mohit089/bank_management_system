<!--
Created by: Mohit and Viren
Topic:Bank Management
-->
<?php

 include_once ("includes/database.php");
$records=mysqli_query($connection,"SELECT * FROM transaction");
//$records1=mysqli_query($connection,"SELECT * FROM users");

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Transaction Details|mvBank</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
                   <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Details </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                          <tr>
					    <th>
                                                Transaction Id
                                
                                            </th>
                                            <th>
                                                Sender Account number
                                            </th>
					    <th>
					    Receiver Account number
					    </th>
                                            <th>
                                               Amount 
                                            </th>
                                            <th>
                                                Remaining Sender Balance
                                            </th>
					    </tr>					    
                                       </thead>
				       </div>
                            </div>
                        </div>
                    </div>
		    <?php
				       while($employee=mysqli_fetch_assoc($records))
					{
						echo "<tr>";
						echo "<td>".$employee['transaction_id']."</td>";
						echo "<td>".$employee['sender_accountnumber']."</td>";
						echo "<td>".$employee['receiver_accountnumber']."</td>";
						echo "<td>".$employee['transaction_amount']."</td>";
						echo "<td>".$employee['sender_balance']."</td>";
						echo "</tr>";
}
?>		
                                    </table>
                                
                        
</body>
<!--   Core JS Files   -->
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap.min.js"></script>
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/now-ui-dashboard.js?v=1.0.0"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="demo/demo.js"></script>

</html>
