<?php namespace JoeStrong\RetroAchievements;

use JoeStrong\RetroAchievements\DataProvider\DataProviderInterface;
use JoeStrong\RetroAchievements\Game\Game;
use JoeStrong\RetroAchievements\Game\GameFormatterInterface;

class RetroAchievements
{
    /**
     * @var DataProviderInterface
     */
    protected $dataProvider;

    /**
     * @param DataProviderInterface $dataProvider
     */
    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * Get the top ten users
     *
     * @return User[]
     * @throws \Error
     */
    public function getTopTenUsers() : array
    {
        /** @todo add formatting */
        return $this->dataProvider->getTopTenUsers();
    }

    /**
     * Get the consoles
     *
     * @return Console[]
     * @throws \Error
     */
    public function getConsoles() : array
    {
        /** @todo add formatting */
        return $this->dataProvider->getConsoles();
    }

    /**
     * Get the games for a particular console
     *
     * @param int $consoleId The id of the console to get games for
     * @param GameFormatterInterface $formatter
     * @return string
     */
    public function getGamesForConsole(int $consoleId, GameFormatterInterface $formatter) : string
    {
        return $formatter->format(
            $this->dataProvider->getGamesForConsole($consoleId)
        );
    }

    /**
     * Get game's info from a game id
     *
     * @param int $gameId The id of the game to look up
     * @return Game The game containing the info
     */
    public function getGameInfo(int $gameId) : Game
    {
        /** @todo add formatting */
        return $this->dataProvider->getGameInfo($gameId);
    }
}
