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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		
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
						<div class="inner" style="height : auto;">
						
						
							
							<label for="learning" style="color:pink;">Your Learning Courses  :</label>




							<section class="tiles">
								
									<table>
											<tr>
												<th>Course </th>
												<th>Guide </th>
												<th>Status </th>
											</tr>
										<?php

								$mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;

								$que = $mysqli->query("SELECT * FROM learner where uid= '$userlog'   ");
     											 	 
     												    while($row1= $que->fetch_assoc())
     												    {   
     												    	echo "<tr>";
     												    	echo "<td>".$row1["course_taken"]."</td>" ;
     												    	
     												    	 $que1 = $mysqli->query("SELECT * FROM course WHERE sno = '".$row1["g_s_no"]."' ") ;
     												    	 $row2 = $que1->fetch_assoc();
     												    	 echo "<td>".$row2["guide_id"]."</td>" ;
     												    	 //echo "<td>".$row1["status"]."</td>";
     												    	 if(!empty($row2["guide_id"]))
     												    	 {
     												    	 		echo "<td style='color:green; '><b>Pursuing</b></td>";
     												    	 }
     												    	 else
     												    	 {
     												    	 	echo "<td style='color:red; '><b>No Guide</b></td>";
     												    	 }
     												    	 echo "</tr>";

															}

     												    	
     												    



							?>
									</table>

</section>
								
										<div>


							
							<label for="learning" style="color:pink;">Learning Guidance  :</label>




							<section class="tiles" ng-app="hello" ng-controller="helloController">
								
									<table>
											<tr>
												<th>Stage 1</th>
												<th>Stage 2 </th>
												<th>Stage 3</th>
												<th>Stage 4</th>
												<th>Stage 5</th>
												

												
											</tr>
										<?php

								$mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;

								$query2 = $mysqli->query("SELECT * FROM learner ");
								while($rows = $query2->fetch_array())
								{
									$temp = $rows["g_s_no"];
									$query3 = $mysqli->query("SELECT * FROM course  ");
									while($rows1 = $query3->fetch_assoc())
									{
										if($temp == $rows1["sno"])
										{
											echo "<tr class='link'>";
											
											//$_SESSION['file_name']=; 
     												    	echo "<td><a href='data_file.php' ng-click='postdata()' ng-model='rev_m' class='call'>".$rows1["div_1"]."</a></td>" ;
     												    	echo "<td><a href='data_file.php' class='call'>".$rows1["div_2"]."</a></td>";
       												    	 echo "<td><a href='data_file.php' class='call'>".$rows1["div_3"]."</a></td>" ;
       												    	 echo "<td><a href='data_file.php' class='call'>".$rows1["div_4"]."</a></td>" ;
       												    	 echo "<td><a href='data_file.php' class='call'>".$rows1["div_5"]."</a></td>" ;
     												    	 echo "</tr>";
										}
									}
								}


     												    	
     												    



							?>
									</table>
									<a>{{msg}}</a>

								
									
								
								
							</section>	
							</div>


							
						</div>



						




					</div>

				<!-- Footer -->
					<footer name ="foot">
						<script>
        var app = angular.module('hello', []);
        app.controller('helloController', function ($scope, $http) {
            $scope.postdata = function () {
                 var dataform ={
                    'data' : $scope.rev_m
                 } ;
                $http.post('data_file.php',dataform).then(function (response) {
                        if (response.data)
                        $scope.msg = "Post Data Submitted Successfully!";
                        $scope.con = response.data;
                        }, function (response) {
                        $scope.msg = "Service not Exists";
                        $scope.statusval = response.status;
                        $scope.statustext = response.statusText;
                        $scope.headers = response.headers();
                        });
            };
        });
    </script>
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