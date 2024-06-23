<?php
function charWeight($char) {
    return ord($char) - ord('a') + 1;
}

function weightedStrings($string, $queries) {
    $weights = [];
    $length = strlen($string);

    for ($i = 0; $i < $length; $i++) {
        $weight = charWeight($string[$i]);
        $currentChar = $string[$i];
        $weights[] = $weight;

        for ($j = $i + 1; $j < $length; $j++) {
            if ($string[$j] == $currentChar) {
                $weight += charWeight($currentChar);
                $weights[] = $weight;
            } else {
                break;
            }
        }
    }

    $weights = array_unique($weights);
    $result = [];

    foreach ($queries as $query) {
        $result[] = in_array($query, $weights) ? 'Yes' : 'No';
    }
    
    return $result;
}
//ex soal 1
$string = "deeffggg";
$queries = [4, 10, 21, 15];

$output = weightedStrings($string, $queries);
print_r($output);

//ex soal 2
$string = "aaabbccccd";
$queries = [3, 6, 12, 24];

$output = weightedStrings($string, $queries);
print_r($output);

//ex
$string = "ddhhji";
$queries = [8, 20, 10, 12];

$output = weightedStrings($string, $queries);
print_r($output);




