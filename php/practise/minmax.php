<?php
$arr = [5,3,2,8,5,6,1];
//finding max of array
$max = 0;
for($i = 0; $i<sizeof($arr); $i++)
{
    if($arr[$i] > $max)
    {$max = $arr[$i];}
}
 
//finding min value of array
$min = $max;
for($i = 0; $i<sizeof($arr); $i++)
{
    if($arr[$i] < $min)
    {$min = $arr[$i];}
}
echo "Max value of this array is $max  and min value is $min";
?>