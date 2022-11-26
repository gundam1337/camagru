<?php 
$minutes_to_add = 60;

$time = new DateTime('2022-11-25 06:15:43');
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

$stamp = $time->format('Y-m-d H:i:s');

echo $time."\n";
echo $stamp."\n";
?>