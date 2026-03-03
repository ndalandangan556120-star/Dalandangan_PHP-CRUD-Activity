<?php

function validateNumber($number) {
    if (!is_numeric($number) || $number < 0) {
        die("Invalid input. Negative values are not allowed.");
    }
}

function computeTotal($price, $qty) {
    return round($price * $qty, 2);
}

function redirect($page) {
    header("Location: $page");
    exit();
}

?>