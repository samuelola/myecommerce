<?php
session_start();
$from_time = date('Y-m-d H:i:s');

$to_time1 = $_SESSION['end_time'];


$timefirst = strtotime($from_time);

$timesecond = strtotime($to_time1);

$differenceInTime = $timesecond-$timefirst;

echo gmdate("H:i:s");


 ?>