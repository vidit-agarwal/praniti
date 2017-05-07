<?php
$postdata = json_decode(file_get_contents("php://input"));
if(isset($postdata))
{

    $my_file .= $postdata->sno;
    $my_file .=$postdata->div;
    $my_file .=".txt";
    $handle_r = fopen($my_file, 'r');
    $data_r = fread($handle_r,filesize($my_file));
    $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
    $data = $postdata->data;
    fwrite($handle, $data);
    echo $data_r;
    fclose($handle_r);
    fclose($handle);

      $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
     
     $firstname = $mysqli->real_escape_string($_POST['fname']);

     $query = $mysqli->query("UPDATE course SET div_".$postdata->div."='$my_file'   WHERE sno='$postdata->sno' ") ;


}
?>