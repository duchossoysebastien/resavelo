<?php

function calculatePrice($price_per_day, $start_date, $end_date) {
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $days = $start->diff($end)->days + 1;
    return $days * $price_per_day;
}