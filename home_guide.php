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
$uid=$_SESSION['userlog'] ;

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
							echo "Welcome Guide :" . $_SESSION['userlog'] ; ?></b></li>
							<li><a href="home.php"><img src="image/home.png" alt="" style="width:5%; height:5%; margin-right:2%;">Home</a></li>
							<!--<li><a href="about.php"><img src="image/about.svg" alt="" style="width:5%; height:5%; margin-right:2%;">About</a></li>-->
							<li><a href="profile.php"><img src="image/contact1.png" alt="" style="width:5%; height:5%; margin-right:2%;">Profile</a></li>
							<li><a href="logout.php"><img src="image/logout.svg" alt="" style="width:5%; height:5%; margin-right:2%; padding-top:2%;">Logout</a></li>
							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
						
						<!----Header---->
							<label for="expertise" style="color:blue;">Your Expertise Field Details :</label>
	
							<?php

								$mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
								$que = $mysqli->query("SELECT * FROM learner");
     											$match = $mysqli->query("SELECT * FROM guide_data");
     												    while($row1= $match->fetch_assoc())
     												    {   /*echo $row1["uid"];
     												echo " ".$_SESSION['userlog'] ;*/
     												    	if($row1["uid"] == $_SESSION['userlog'])
     												    	{
     												    		 $coursename=$row1["expertise"] ;	
     												    		}	
     												    }
     											 $que1 = $mysqli->query("SELECT * FROM fields WHERE fields_value='$coursename'") ;
     											$result= $que1->fetch_assoc();
     											$courseid = $result["field_id"];
     												    //echo $courseid ;

							?>
							<form action="send.php" method="POST">
							<input  name="cn" type="text" value="<?php echo $coursename; ?>" readonly = "readonly"></input>
							<input  name="gid" type="text" value="<?php echo $_SESSION['userlog']; ?>" readonly = "readonly"></input>
								<input type = "text" name="cid" value="<?php echo $courseid; ?>" readonly = "readonly"></input>
								<label for="users-allot" style="color:blue;">Number Of divisions in course module:</label>
								<input type="number" maxvalue=5 minvalue=3 name="div" required></input>
								<input type="submit" name="go" value="Go"></input>
								</form>






							<section class="tiles">
								
									<article >
										<label for="users-allot" style="color:blue;">Students matching your Field :</label>
	
									<span class="image">
										<!--<img src="image/add-user.png" alt="" />-->
										
										

											<select multiple name="users-allot" style="width : 100% ; height: 100% ; background-color: #eee ;">
												<?php

												
     											$que = $mysqli->query("SELECT * FROM learner");
     											$match = $mysqli->query("SELECT * FROM guide_data");

     										//	if($que->num_rows>0 || $match->num_rows>0)
     										//	{
     												  
     												    while($row1= $match->fetch_assoc() )
     												    {   /*echo $row1["uid"];
     												echo " ".$_SESSION['userlog'] ;*/
     												    	if($row1["uid"] == $_SESSION['userlog'])
     												    	{
     												    		 while($row= $que->fetch_assoc())
     												  			  {
     												    				if($row["course_taken"]==$row1["expertise"])
     												    			{
     												    				echo "<option value='".$row["uid"]."'>'".$row["uid"]."'</option>";
     												    			}
     												    		}
     												    	}
     												    }





     												   

     										//	}


/*
												for($i=1 ; $i<=10 ; $i++)
												{
													echo "<option value='apple'>Apple</option>";
												}
													while($row= $que->fetch_assoc())
     												    {
     												    		if($row["course_taken"]==$row1["expertise"])
     												    		{
     												    			echo "<option value='".$row["uid"]."'>'".$row["uid"]."'</option>";
     												    		}
     												    }

												*/


													?>


											</select>


									</span>
									
								</article>

								<article class="style2">
									<span class="image">
										<!--<img src="image/add-user.png" alt="" />-->
											<select multiple name="users-unallot" style="width : 100% ; height: 100% ; background-color: #eee ;">
												<?php

												for($i=1 ; $i<=10 ; $i++)
												{
													echo "<option value='apple'>Apple</option>";
												}


													?>


											</select>


									</span>
									
								</article>

								
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