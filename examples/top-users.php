<?php

require_once('../vendor/autoload.php');

use JoeStrong\RetroAchievements\DataProvider\RetroAchievementsApiDataProvider;
use JoeStrong\RetroAchievements\RetroAchievements;

$username = '';
$apiKey = '';

$retroAchievementsClient = new RetroAchievementsApiDataProvider($username, $apiKey);

$ra = new RetroAchievements($retroAchievementsClient);
$users = $ra->getTopTenUsers();

echo "<strong>Top users</strong><br>";
foreach ($users as $user) {
    echo "$user->getUsername()<br>";
}
