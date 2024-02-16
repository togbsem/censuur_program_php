<?php
require 'C:\semmo_projectjes\php\censuur_functions.php'; // bestand met de functies

$badWords = array("poep", "plas");
$niceWords = array("hoi", "doei");

echo "Input: ";

// Tekstvoorbeeld met grove taal
$text1 = fgets(STDIN);

// Corrigeer hoofdletters in zinnen
$text2 = correctCapitalization($text1);

// Vervang grove woorden door aardige woorden
$text3 = replaceBadWords($text2, $badWords, $niceWords);

// Toon afgebroken tekst
$text_trunc = truncateText($text3, 100);

// Bereken statistieken
// Grofheids indicator
$indicator = taalIndicator($text1, $badWords);
// Tel aantal woorden
$allWords = wordCount($text3);
// Tel aantal vervangen woorden
$replacedWords = replacedCount($text1, $badWords);
// Tel aantal gekapitaliseerde woorden
$capitalized = numb_of_capt($text1, $text2);
// Toon percentage vervangen woorden
$percentage = perc_replaced($allWords, $replacedWords);
// Tel hoe vaak eenzelfde grofwoord voer komt
$same_bad_word = sbw($text1, $badWords);

// toon statistieken
echo "\n" . "Gecorrigeerde tekst: " . $text_trunc;
echo "Grove taal-indicator: " . ($indicator ? "zeer grof" : "Niet grof") . "\n";
echo "Aantal woorden: " . $allWords . "\n";
echo "Aantal vervangen woorden: " . $replacedWords . "\n";
echo "Aantal gecorrigeerde hoofdletters: " . $capitalized . "\n";
echo "Percentage vervangen woorden: " . $percentage . "%" . "\n";
foreach ($same_bad_word as $badWord => $count) {
    echo "Het woord '$badWord' komt $count keer voor in de tekst.\n";
}
?> 