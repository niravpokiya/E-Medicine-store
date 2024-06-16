<?php
$str = "abcdefghi";
$target = "gh";
$lengthofsubstr = strlen($target);
for($i=0; $i<strlen($str);$i++)
{
    if(substr($str,$i,$lengthofsubstr) == $target)
    {
        echo "Yes $target string is exists in $str string at index $i.";
        exit(0);
    }
}
echo "target string is not exists in given string.";
?>