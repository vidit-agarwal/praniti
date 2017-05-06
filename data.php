
 <?php 
					 $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
					$query=$mysqli->query("SELECT * FROM guide_data ");

														if($query->num_rows>0)
														{
																while($row = $query->fetch_assoc())
																{
																	
																		$expert = $row['expertise'];
																		$array[] = $expert ;





																}
																echo json_encode($array);

														}
                      



				?>

			