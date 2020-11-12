<?php

function setJson($data, $succes, $errors)
{
    return [
        'success' => $succes,
        'errors' => $errors,
        'data' => $data,
    ];
}

function percentageValue($total, $data)
{
    if ($total == 0) {
        return 0;
    }
    $percentage = ($data / $total) * 100;

    return round($percentage, 2);
}

function averageCount($sum, $total)
{
    if ($total == 0) {
        return 0;
    }
    $data = $sum / (int) $total;

    return (float) round($data, 2);
}
