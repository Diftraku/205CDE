<?php
// Snippet
$text = "20.5testing";
$number = 0;
$f_number = 3.14;
$number = $number + $text;
$f_number = $f_number + $text;
echo  "Values " . $number . " and " . $f_number."\n";

// Array of strings
$array = [
    'string',
    'arrays',
    'stuff'
];
foreach ($array as $item) {
    echo $item."\n";
}

// Radius
print(2*pi()*2.00);