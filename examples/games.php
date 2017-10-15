<?php

require_once('../vendor/autoload.php');

use JoeStrong\RetroAchievements\RetroAchievements;
use JoeStrong\RetroAchievements\DataProvider\RetroAchievementsApiDataProvider;

$username = '';
$apiKey = '';

$retroAchievementsClient = new RetroAchievementsApiDataProvider($username, $apiKey);

$ra = new RetroAchievements($retroAchievementsClient);

$formatter = new JoeStrong\RetroAchievements\Game\Formatter\HtmlGameFormatter();

echo  $ra->getGamesForConsole(3, $formatter);
