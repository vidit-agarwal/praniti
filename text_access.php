<?php

    $my_file = 'file.txt';
    $handle = fopen($my_file, 'r');
    $data = fread($handle,filesize($my_file));
    echo $data;

?>