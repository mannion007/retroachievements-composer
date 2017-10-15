<?php

require_once('../vendor/autoload.php');

use JoeStrong\RetroAchievements\DataProvider\RetroAchievementsApiDataProvider;
use JoeStrong\RetroAchievements\RetroAchievements;

$username = '';
$apiKey = '';

$retroAchievementsClient = new RetroAchievementsApiDataProvider($username, $apiKey);

$ra = new RetroAchievements($retroAchievementsClient);
$consoles = $ra->getConsoles();

foreach ($consoles as $console) {
    echo "$console->getName()<br>";
}
