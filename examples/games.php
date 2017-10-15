<?php

require_once('../vendor/autoload.php');

use JoeStrong\RetroAchievements\RetroAchievements;

$username = '';
$apiKey = '';

$ra = new RetroAchievements($username, $apiKey);

$formatter = new JoeStrong\RetroAchievements\Game\Formatter\HtmlGameFormatter();

echo  $ra->getGamesForConsole(3, $formatter);
