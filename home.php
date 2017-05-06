<?php
session_start();
if(!isset($_SESSION['userlog']))
{ 
	/*session_start();*/
	echo '<script type="text/javascript">
                    alert("Please Login To continue !");
                    window.location="index.php";
                    </script> ';
	
}
else
{
	
}
$userlog = $_SESSION['userlog'];

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Praniti: Home</title>
		<link href="image/download.png" rel="icon"> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<link rel="stylesheet" href="css/main.css" />
		
		
	</head>
	<body class ="body_home">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="image/download.png" alt="" /></span><span class="title">Praniti</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header
				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><b><img src="image/login.png" alt="" style="width:5%; height:5%;margin-right:2%;"><?php /*session_start();*/
							echo "Welcome Learner :" . $_SESSION['userlog'] ; ?></b></li>
							<li><a href="home.php"><img src="image/home.png" alt="" style="width:5%; height:5%; margin-right:2%;">Home</a></li>
							<!--<li><a href="about.php"><img src="image/about.svg" alt="" style="width:5%; height:5%; margin-right:2%;">About</a></li>-->
							<li><a href="profile_learner.php"><img src="image/contact1.png" alt="" style="width:5%; height:5%; margin-right:2%;">Profile</a></li>
							<li><a href="logout.php"><img src="image/logout.svg" alt="" style="width:5%; height:5%; margin-right:2%; padding-top:2%;">Logout</a></li>
							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
						
						<!----Header---->
							
							<label for="learning" style="color:pink;">Your Learning Courses  :</label>




							<section class="tiles">
								
									<table>
											<tr>
												<th>Course </th>
												<th>Status </th>
												<th>Guide</th>
											</tr>
										<?php

								$mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
								
								$que = $mysqli->query("SELECT * FROM learner where uid= '$userlog'   ");
     											 	 
     												    while($row1= $que->fetch_assoc())
     												    {   
     												    	echo "<tr>";
     												    	echo "<td>".$row1["course_taken"]."</td>" ;
     												    	echo "<td>".$row1["status"]."</td>";
     												    	 $que1 = $mysqli->query("SELECT * FROM course WHERE sno = '".$row1["g_s_no"]."' ") ;
     												    	 $row2 = $que1->fetch_assoc();
     												    	 echo "<td>".$row2["guide_id"]."</td>" ;
     												    	 echo "</tr>";

															}

     												    	
     												    



							?>
									</table>

								
									
								
								
							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer name ="foot">
		<nav><a><center>HugeArdor © 2017</center></a></nav>
	</footer>

			</div>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			
			<script src="js/main.js"></script>

	</body>
</html>