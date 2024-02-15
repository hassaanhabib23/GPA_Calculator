<?php
function assignmentmarks($name)
{
    $Asgmntmarks = (int)$_POST[$name];
    return $Asgmntmarks;
}

function quizmarks($name)
{
    $quizmarks = (int)$_POST[$name];
    return $quizmarks;
}

function midmarks($name)
{
    $midmarks = (int)$_POST[$name];
    return $midmarks;
}


function finalmarks($name, $cr_hr)
{
    $finalmarks = (int)$_POST[$name];
    if ($cr_hr == 1) {
        $percentage = ($finalmarks / 50) * 25;
        return $percentage;
    } else {
        return $finalmarks;
    }
}
function labmarks($name){
    $labmarks=(int)$_POST[$name];
    return $labmarks;
}

function calculateweightage($percentage, $cre_hour)
{
    if ($percentage >= 85) {
        $weightage = 4;
    } else if ($percentage >= 80 && $percentage <= 84) {
        $weightage = 3.7;
    } else if ($percentage >= 75 && $percentage <= 79) {
        $weightage = 3.5;
    } else if ($percentage >= 70 && $percentage <= 74) {
        $weightage = 3;
    } else if ($percentage >= 65 && $percentage <= 69) {
        $weightage = 2.5;
    } else if ($percentage >= 60 && $percentage <= 54) {
        $weightage = 2;
    } else if ($percentage >= 55 && $percentage <= 59) {
        $weightage = 1.5;
    } else if ($percentage >= 50 && $percentage <= 54) {
        $weightage = 1;
    } else {
        $weightage = 0;
    }
    if ($cre_hour == 4) {
    }
    return $weightage * $cre_hour;
}

