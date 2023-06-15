<?php
$asciiArray = range(',', '|');
$removedChar = array_splice($asciiArray, array_rand($asciiArray), 1);
$missingChar = null;
foreach ($asciiArray as $char) {
    if (!in_array($char, $asciiArray)) {
        $missingChar = $char;
        break;
    }
}
echo "Caractere removido: " . $removedChar[0] . "\n";
echo "Caractere que está faltando: " . $missingChar . "\n";
?>
