<?php namespace JoeStrong\RetroAchievements\DataProvider;

use JoeStrong\RetroAchievements\Game\Game;
use JoeStrong\RetroAchievements\User;

interface DataProviderInterface
{
    /**
     * @return User[]
     */
    public function getTopTenUsers() : array;

    /**
     * @return User[]
     */
    public function getConsoles() : array;

    /**
     * @param int $consoleId
     * @return Game[]
     */
    public function getGamesForConsole(int $consoleId): array;

    /**
     * @param int $gameId
     * @return Game
     */
    public function getGameInfo(int $gameId) : Game;
}
