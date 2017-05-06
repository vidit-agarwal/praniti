<html>
<head>
	 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Scheduler :About</title>
	<link href="image/download.png" rel="icon"> 
	 <link rel="stylesheet" href="css/style1.css">
	   <link rel="stylesheet" href="css/style.css">
	 <style>
body {
  background-image :url('image/background.jpg');
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 90%;
  font: inherit;
  vertical-align: baseline;
  font-family: 'Titillium Web', sans-serif;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
footer nav a{
  color : #778899;
}
footer
{
	position:fixed;
	bottom :0;
	width:100%;
}
.contact_text{
	z-index:1;
	width:50%;
	background : #eee;
	filter: alpha(opacity=60);  /* IE 5-7 */
-moz-opacity: 0.6;          /* Netscape */
-khtml-opacity: 0.6;        /* Safari 1.x */
    opacity: 0.6;
	height :300px;
	overflow: hidden;
	margin-left:26%;
	margin-top:7.5%;
	position: fixed;

	top:30%;
}
.contact_icon{
	z-index:2;
	background-image: url('image/about.png');
	width:250px;
	height:250px;
	margin-top:16%;
	margin-left : 28%;
	-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.contact_text h2 {
font-size:60px;
margin-top:1%;
padding : 1px 0px 0px 45%;
}
#span_text {
	margin-top:70%;
	padding-left : 30%;
}
</style>



</head>
<body>
<?php
include 'header.php';
?>

<div class="contact_body">
<div class="contact_icon">



</div>
<div class="contact_text">
<p><h2>
About

</h2></p>
<span id="span_text"><p>
<b>
This project is to design and implement an algorithm to create a semester course time table by assignimg time-slots to a given set of courses to be run for that semester under given constraints.Time table management is a difficult task in any educational institute management system and it is done manually.Goal of this project is to try to automate the process of time table management.Another goal of this project is to try to make it intelligent so that it knows a little about time table based upon user input and help the user in managing the time table.      
</b>
</p></span>	

	</div>


</div>



<footer name ="foot" style="background: #eee; font-weight:bold;">
		<nav><a><center>HugeArdor © 2017</center></a></nav>
	</footer>

	</body>
	</html>
