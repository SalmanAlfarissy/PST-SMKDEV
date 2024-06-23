<?php
function balancedBracket($string) {
    $sbracket = [];
    $unbalace = [];
    $brackets = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if (in_array($char, $brackets)) {
            array_push($sbracket, $char);
        } elseif (isset($brackets[$char])) {
            if (empty($sbracket) || array_pop($sbracket) != $brackets[$char]) {
                array_push($unbalace, $char);
            }
        }
    }

    if (empty($unbalace)) {
        return 
        "\nInput: ".$string.
        "\nOutput: "."YES".
        "\nPenjelasan: Semua tanda kurung berpasangan dengan benar: ".$string." adalah seimbang.";
    } else {
        return 
        "\nInput: ".$string.
        "\nOutput: "."NO".
        "\nPenjelasan: String".$string."tidak seimbang karena terdapat pasangan yang tidak sesuai antara ".implode(' dan ',$unbalace).".";
    }
}
//ex soal 1
echo balancedBracket("([{}])");
echo balancedBracket("([{]})");
echo balancedBracket("({[]})");
echo "\n====================================\n";
//ex soal 2
echo balancedBracket("{[(())]}");
echo balancedBracket("{[(])}");
echo balancedBracket("[{()}]");
echo "\n====================================\n";
//ex
echo balancedBracket("{[[})}");
echo balancedBracket("[{(])}");
echo balancedBracket("{[()]}");
