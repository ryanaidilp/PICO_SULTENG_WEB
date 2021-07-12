<?php

function percentageValue($total, $value)
{
    if ($total == 0) {
        return 0;
    }

    $percentage = ($value / $total) * 100;

    return round($percentage, 2);
}

function averageCount($sum, $total)
{
    if ($total == 0) {
        return 0;
    }

    $data = $sum / $total;

    return round($data, 2);
}

function formatCase($value)
{
    $prefix = $value > 0 ? "+" : "";
    $value = number_format($value, 0, ",", ".");
    return $prefix . $value;
}
