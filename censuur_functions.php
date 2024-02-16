<?php

function replaceBadWords($text, $badWords, $niceWords) {
    foreach ($badWords as $badWord) {
        $replacement = $niceWords[array_rand($niceWords)];
        $text = str_ireplace($badWord, $replacement, $text);
    }
    return $text;
}

function correctCapitalization($text) {
    return ucfirst(strtolower($text));
}

function truncateText($text, $maxLength) {
    if (strlen($text) > $maxLength) {
        $text = substr($text, 0, $maxLength) . '...';
    }
    return $text;
}

function taalIndicator($text, $badWords) {
    foreach ($badWords as $badWord) {
        if (stripos($text, $badWord) !== false) {
            return true;
        } else {
            return false;
        }
    }
}

function wordCount($text) {
    return str_word_count($text);
}

function replacedCount($text, $badWords) {
    $count = 0;

    foreach ($badWords as $badWord) {
        if (stripos($text, $badWord) !== false) {
            $count++;
        }
    }

    return $count;
}

function numb_of_capt($oldtext, $newtext) {
    return levenshtein($oldtext, $newtext);
}

function perc_replaced($allWords, $replacedWords) {
    return round($replacedWords / $allWords * 100);
}

function sbw($text, $badWords) {
    $occurrences = [];

    foreach ($badWords as $badWord) {
        $count = substr_count(strtolower($text), strtolower($badWord));
        $occurrences[$badWord] = $count;
    }

    return $occurrences;
}
?>