<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Scheduler:Update Teacher</title>
  <link href="image/download.png" rel="icon"> 
 

</head>

<body>
	
  <div class="body">
  </div>
		<div class="grad">
		</div>
		<div class="search" >
		<form method="POST">

			<input type="text" placeholder ="Enter Teacher Name To Search" name ="name" required> 
			<input type="submit" value="search" name="search"><br>
		</form>
	</div>

		
	
 

<footer name ="foot" style="background: #eee; font-weight:bold;">
		<nav><a><center>HugeArdor © 2017</center></a></nav>
	</footer>

  
<form method="POST" >
<?php
if (isset($_POST['search'])) 
{
   //connect to daatabase;
     $mysqli = NEW  MySQLi('localhost', 'root', 'hmr17@tt' , 'hmr_db') ;
     
     $name = $mysqli->real_escape_string($_POST['name']);
     
     $query = $mysqli->query("SELECT * FROM teacher WHERE t_name ='$name' ");

     echo "<table>" ;
		while($row= mysqli_fetch_array($query))
		{
			echo "<tr>" ;
			echo "<td>" ; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["id"] ;?>" /> <?php echo "</td>" ;
			echo "<td>" ; echo $row['id'] ; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_name']; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_dept']; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_desig'] ; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_email']; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_lctr']; echo "<td>" ; 
			echo "<td>" ;  echo $row['t_numb']; echo "<td>" ; 
echo "</tr>" ; 

		}
     echo "<?table>" ;
 }
     ?>
     <input type="submit" value="delete" name="delete">
     </form>
     </body>
     </html>

<?php
if(isset($_POST['delete']))
{
	$box=$_POST['num[]'];
	while(list($key, $val)= @each ($box))
	{
		mysqli_query($link, "DELETE FROM teacher WHERE t_id ='$name' ");
	}

	echo '<script type=" text/javascript">
	window.location.href=window.location.href ;
	</script> ';
	
}
?>