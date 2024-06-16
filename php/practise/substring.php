<?php
function findSubstrings($str, $index = 0, $current = '') {
    static $substrings = [];

    if ($index == strlen($str)) {
        if (!empty($current)) {
            $substrings[] = $current;
        }
    } else {
        findSubstrings($str, $index + 1, $current);
        findSubstrings($str, $index + 1, $current . $str[$index]);
    }

    return $substrings;
}

$str = "abcd";
$substrings = findSubstrings($str);

echo "All substrings of '$str':<br>";
foreach ($substrings as $substring) {
    echo "$substring<br>";
}
?>
