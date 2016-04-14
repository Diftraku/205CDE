<?php
$string = "I'll \"walk\" the <span onmouseover='alert(document);'>dog</span> now";  // notice \-sign before double quotes!

$a = htmlentities($string);
$b = html_entity_decode($string);
$c = htmlspecialchars($string);
$d = strip_tags($string, '<span>');

/**
 * Either disable HTML completely (use Markdown or similar parsed format)
 * or parse the HTML with the built in DOM-tools (very heavy and prone to breaking on bad input)
 */

echo $a.", ".$b.", ".$c.", ".$d;