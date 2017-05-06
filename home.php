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


?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Scheduler: Home</title>
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
									<span class="symbol"><img src="image/download.png" alt="" /></span><span class="title">SCHEDULER</span>
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
							echo "Welcome User :" . $_SESSION['userlog'] ; ?></b></li>
							<li><a href="home.php"><img src="image/home.png" alt="" style="width:5%; height:5%; margin-right:2%;">Home</a></li>
							<li><a href="about.php"><img src="image/about.svg" alt="" style="width:5%; height:5%; margin-right:2%;">About</a></li>
							<li><a href="contact.php"><img src="image/contact1.png" alt="" style="width:5%; height:5%; margin-right:2%;">Contact</a></li>
							<li><a href="logout.php"><img src="image/logout.svg" alt="" style="width:5%; height:5%; margin-right:2%; padding-top:2%;">Logout</a></li>
							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
						
						<!----Header---->
							
							
							<section class="tiles">
									<article class="style6">
									<span class="image">
										<img src="image/add-user.png" alt="" />
									</span>
									<a href="add_user.php">
										<h2>Add User</h2>
										<div class="content">
											<p>Click on this to add new user.</p>
										</div>
									</a>
								</article>
								<article class="style1">
									<span class="image">
										<img src="image/teacher2.png" alt="" />
									</span>
									<a href="add_teacher.php">
										<h2>Add Teacher</h2>
										<div class="content">
											<p>Click on this to add new teacher.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="image/branch.png" alt="" />
									</span>
									<a href="add_branch.php">
										<h2>Add Branch</h2>
										<div class="content">
											<p>Click on this to add new branch.</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="image/subject.png" alt="" />
									</span>
									<a href="add_subject.php">
										<h2>Add Subject</h2>
										<div class="content">
											<p>Click on this to add new subject.</p>
										</div>
									</a>
								</article>
									<article class="style6">
									<span class="image">
										<img src="image/add-lab.png" alt="" />
									</span>
									<a href="add_lab.php">
										<h2>Add Lab</h2>
										<div class="content">
											<p>Click on this to add new Lab.</p>
										</div>
									</a>
								</article>

								<article class="style4">
									<span class="image">
										<img src="image/e_teach.svg" alt="" />
									</span>
									<a href="edit_teacher.php">
										<h2>Edit Teacher</h2>
										<div class="content">
											<p>Click on this to edit teacher.</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="image/lecture.png" alt="" />
									</span>
									<a href="generic.html">
										<h2>Assign Lectre</h2>
										<div class="content">
											<p>Click on this to assign lectre.</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="image/lab.jpg" alt="" />
									</span>
									<a href="generic.html">
										<h2>Assign Lab</h2>
										<div class="content">
											<p>Click on this to assign labs.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="image/lab2.png" alt="" />
									</span>
									<a href="generic.html">
										<h2>Lab Wise Time Table</h2>
										<div class="content">
											<p>Click on this to generate Lab wise time table.</p>
										</div>
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="image/lab3.png" alt="" />
									</span>
									<a href="generic.html">
										<h2>Lab Time Table</h2>
										<div class="content">
											<p>Click on this to generate Lab time table.</p>
										</div>
									</a>
								</article>
								<article class="style1">
									<span class="image">
										<img src="image/tt.png" alt="" />
									</span>
									<a href="generic.html">
										<h2>Teacher Time Table</h2>
										<div class="content">
											<p>Click on this to generate Teacher time table.</p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="image/ct.jpg" alt="" />
									</span> 
									<a href="generic.html">
										<h2>Class Time Table</h2>
										<div class="content">
											<p>Click on this to generate Class time table.</p>
										</div>
									</a>
								</article>
								<article class="style6">
									<span class="image">
										<img src="image/generate.png" alt="" />
									</span> 
									<a href="generic.html">
										<h2>Generate</h2>
										<div class="content">
											<p>Click on this to Generate time table.</p>
										</div>
									</a>
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