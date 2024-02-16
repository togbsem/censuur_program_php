<?php
require 'C:\semmo_projectjes\php\censuur_web_functions.php'; // bestand met de functies

$badWords = array("poep", "plas");
$niceWords = array("hoi", "doei");

// Tekstvoorbeeld met grove taal
$text1 = "dit is een tekst met grove woorden zoals poep en plas. 
ook plas en plas is vies net zoals poep";

// Corrigeer hoofdletters in zinnen
$text2 = correctCapitalization($text1);

// Vervang grove woorden door aardige woorden
$text3 = replaceBadWords($text2, $badWords, $niceWords);

// Toon afgebroken tekst
$text_trunc = truncateText($text3, 15);

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
echo "Gecorrigeerde tekst: " . $text_trunc . "<br>";
echo "Grove taal-indicator: " . ($indicator ? "zeer grof" : "Niet grof") . "<br>";
echo "Aantal woorden: " . $allWords . "<br>";
echo "Aantal vervangen woorden: " . $replacedWords . "<br>";
echo "Aantal gecorrigeerde hoofdletters: " . $capitalized . "<br>";
echo "Percentage vervangen woorden: " . $percentage . "%" . "<br>";
foreach ($same_bad_word as $badWord => $count) {
    echo "Het woord '$badWord' komt $count keer voor in de tekst.<br>";
}
?> 