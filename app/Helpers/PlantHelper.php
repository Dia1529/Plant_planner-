<?php

namespace App\Helpers;

function getPlantStageDescription($stage)
{
    $stages = [
        1 => 'Seed',
        2 => 'Leaflet',
        3 => 'Young Plant',
        4 => 'Full Bloom',
    ];

    return $stages[$stage] ?? '';
}

function getDropletsRequired($stage)
{
    $requirements = [
        1 => 3,
        2 => 3,
        3 => 4,
    ];

    return $requirements[$stage] ?? 0;
}
