<?php

    $my_file = '173.txt';
    $handle = fopen($my_file, 'r');
    $data = fread($handle,filesize($my_file));
    echo $data;

?>