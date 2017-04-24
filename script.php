<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Enriqueta|Glegoo|Merriweather" rel="stylesheet">

        <style>
           * {
             font-family:'Bitter';
           }
           h1,h2 {
            font-family: 'Bitter';
            }
           html,body {
             min-height:100%;
             height:auto;
            }
           .container-fluid {
              color: aqua;
            }
            img {
                max-width: 75%;
            }
            .back {
                 background: -webkit-linear-gradient(blue,#00004D) no-repeat scroll;
                 background-size: contain;
                 height: 100%;
                 width: 100%;
           }
         </style>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
       <div class="back">
       <br/><br/>
       <center>
        <a href="https://3dsmaniac.github.io/home"><img src="http://aerofuntools.host22.com/img/q1.jpg" alt="img"></a>
       <br/><br/><br/>
	<?php
	$servername = "localhost";
	$username = "id1409636_studs";
	$password="testing";
	$dbname ="id1409636_students";

	$conn = new mysqli($servername, $username, $password,$dbname);

	if($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
	
        ?> <div class="container-fluid"> <?php
        if ($_POST)
	   $roll = $_POST['roll'];
        else
          $roll = "";
        if((float)substr($roll,5,3) && strtoupper (substr($roll,0,2))==="AE" && ctype_digit(substr($roll,5,3)))   
           $no = (float)(substr($roll,5,3));
        else
        {
         $no=999;
         echo "<h3>Only for Aero!</h3><br>";
         }
        if ($roll)
            echo "Your ID -> ".addslashes(strtoupper($roll))."<br/>";
        else
            echo "Your ID -> None Given<br/>";
	$sql = "Select * from Students where ID='$roll'";
	$result = $conn->query($sql);
        while($row = $result->fetch_assoc())
         {
	    echo "<div style='display:inline;'><h2 style='display:inline;' >Welcome</h2></div><br/><div style='display:inline;'><img src='http://www.animatedgif.net/bulletsballs/aball5_e0.gif' class='style' alt='question'></div><div style='display:inline;'id='name'><h2 style='display:inline;'><b> ".$row['Name']."</b> </h2></div><div style='display:inline;'><img src='http://www.animatedgif.net/bulletsballs/aball5_e0.gif' class='style' alt='question'></div><br/><br/>";
        }
	if($no<30)
	{
		$Q = 1-$no/30;
		echo "Obtained ";
	}
	else if($no<46)
	{
		$Q = $no/15-1;
		echo "Obatined ";
	}
	else if($no>100 && $no<116)
	{
		$Q = 2 + ($no-100)/15;
		echo "Obatined ";
	}
	else
	{
		echo "<script type='text/javascript'>alert('You are not from Aero 16!');</script>";
		$Q = 1;
		echo "Default ";
	}

	echo "&Phi; is : ".$Q;
	if($Q<=1)
	{
		$result = ($Q*241845*1.0)/($Q*40 + (1-$Q)/2*35 +79/42*33) + 298;
		$result1 = ($Q*241845*1.0)/($Q*40 + (1-$Q)/2*35) + 298;
	}
	else
	{
		$result = (241845*1.0)/(40 + ($Q-1)*30 +79/42*33) + 298;
		$result1 = (241845*1.0)/(40 + ($Q-1)*30) + 298;
	}
	
	echo "<h2>The resultant adiabatic flame temperatures are :</h2><br/><br/>";
	echo "For air : ".$result." K<br/>";
	echo "With only oxygen and hydrogen : ".$result1." K<br/>";
        echo "<br/><br/><br/><br/></div>";
?>
</center>
</div>
<script>
 $(document).ready( function() {
        $('body').height($('html').height());
         if($(window).width()<700)
          {
             $('#name').css('font-size','0.35em');
             $('.style').css('display','none');
             $('#name').append("<br/>");
             $('body').css('height','100%');
         }
      });
</script>

</body>
</html>
