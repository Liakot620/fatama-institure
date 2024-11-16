<?php 
fscanf(STDIN,"%d %d %d",$wheels,$body,$figures);
printf("%d %d %d\n",$wheels, $body, $figures);
$person_4=floor($wheels/4);
$person_2=floor($body/1);
$person_1=floor($figures/2);
$total_car=min($person_1,$person_2,$person_4);
printf("%d \n",$total_car);
?>