<?php
function getCalendarFromJSON($file_path){
    $string = file_get_contents($file_path);
    return $json_a = json_decode($string, true);
}

/**
 * @param $time
 * @param $timezone
 * @param bool $useFullDayName
 * @return string
 * @throws Exception
 */
function formatTime($time, $timezone, $useFullDayName = true)
{
    $formattedTime = new DateTime($time);
    $formattedTime->setTimezone(new DateTimeZone($timezone));
    return $useFullDayName == true ? $formattedTime->format('l d F H:i') : $formattedTime->format('d F H:i');
}
