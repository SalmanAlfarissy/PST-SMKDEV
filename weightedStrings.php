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

$string = "deeffggg";
$queries = [4, 10, 21, 15];

$output = weightedStrings($string, $queries);
print_r($output);


