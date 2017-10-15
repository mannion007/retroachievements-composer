<?php

require_once('../vendor/autoload.php');

use JoeStrong\RetroAchievements\DataProvider\RetroAchievementsApiDataProvider;
use JoeStrong\RetroAchievements\RetroAchievements;

$username = '';
$apiKey = '';

$retroAchievementsClient = new RetroAchievementsApiDataProvider($username, $apiKey);

$ra = new RetroAchievements($retroAchievementsClient);
$game = $ra->getGameInfo(344);

echo <<<HTML
    ID: $game->getId()<br>
    Title: $game->getTitle()<br>
    Forum topic ID: $game->getForumTopicId()<br>
    Console ID: $game->getConsoleId()<br>
    Image icon: $game->getImageIcon()<br>
    Game icon: $game->getGameIcon()<br>
    Image title: $game->getImageTitle()<br>
    Image in game: $game->getImageInGame()<br>
    Image box art: $game->getImageBoxArt()<br>
    Publisher: $game->getPublisher()<br>
    Developer: $game->getDeveloper()<br>
    Genre: $game->getGenre()<br>
    Release Date: $game->getReleaseDate()<br>
HTML;
