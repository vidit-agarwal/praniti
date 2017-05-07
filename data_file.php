<?php

    $my_file = '171.txt';
    $handle = fopen($my_file, 'w');
    $data = "hello";
    fwrite($handle,$data);
    echo $data;

?>