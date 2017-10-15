<?php

namespace JoeStrong\RetroAchievements\DataProvider;

use GuzzleHttp\Client;
use JoeStrong\RetroAchievements\Game\Game;

class RetroAchievementsApiDataProvider implements DataProviderInterface
{
    protected $apiUrl = 'http://retroachievements.org/API/';
    protected $username;
    protected $apiKey;
    protected $client;

    /**
     * Makes requests to the RetroAchievements.org API
     *
     * @param string $username Your RetroAchievements.org username
     * @param string $apiKey Your RetroAchievements.org API key
     */
    public function __construct(string $username, string $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
        $this->client = new Client(['base_uri' => $this->apiUrl]);
    }

    /**
     * Make a request to the RetroAchievements.org API
     *
     * @param string $endpoint
     * @param array $parameters
     * @return mixed
     * @throws \Error
     */
    private function request(string $endpoint, array $parameters = [])
    {
        $auth = "?z={$this->username}&y={$this->apiKey}";
        $parameters = array_reduce(array_keys($parameters), function ($carry, $key) use ($parameters) {
            return "$carry&$key=$parameters[$key]";
        });

        $result = $this->client->get($endpoint . $auth . "&$parameters");
        if ($result->getStatusCode() !== 200) {
            throw new \Error('Could not get the data');
        }
        try {
            return \json_decode($result->getBody());
        } catch (\Error $e) {
            throw new \Error('Did not receive a JSON response');
        }
    }

    public function getTopTenUsers(): array
    {
        $userData = $this->request('API_GetTopTenUsers.php');

        return array_map(function ($data) {
            return new User($data->{1}, (int) $data->{2}, (int) $data->{3});
        }, $userData);
    }

    public function getConsoles(): array
    {
        $consoleData = $this->request('API_GetConsoleIDs.php');

        return array_map(function ($data) {
            return new Console((int) $data->ID, $data->Name);
        }, $consoleData);
    }

    public function getGamesForConsole(int $consoleId): array
    {
        $gamesData = $this->request('API_GetGameList.php', ['i' => $consoleId]);

        return array_map(function ($gameData) {
            return new Game(
                $gameData->ID,
                $gameData->Title,
                $gameData->ConsoleID,
                $gameData->ImageIcon
            );
        }, $gamesData);
    }

    public function getGameInfo(int $gameId): Game
    {
        $gameData = $this->request('API_GetGame.php', ['i' => $gameId]);

        return new Game(
            $gameId,
            $gameData->Title,
            $gameData->ConsoleID,
            $gameData->ImageIcon,
            $gameData->GameIcon,
            $gameData->ImageTitle,
            $gameData->ImageIngame,
            $gameData->ImageBoxArt,
            $gameData->Publisher,
            $gameData->Developer,
            $gameData->Genre,
            $gameData->Released,
            $gameData->ForumTopicID
        );
    }
}
