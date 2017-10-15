<?php

namespace spec\JoeStrong\RetroAchievements;

use JoeStrong\RetroAchievements\Console;
use JoeStrong\RetroAchievements\DataProvider\DataProviderInterface;
use JoeStrong\RetroAchievements\Game\Game;
use JoeStrong\RetroAchievements\Game\GameFormatterInterface;
use JoeStrong\RetroAchievements\User;
use PhpSpec\ObjectBehavior;


class RetroAchievementsSpec extends ObjectBehavior
{
    private $dataProvider;

    function let(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
        $this->beConstructedWith($this->dataProvider);
    }

    function it_should_get_top_ten_users()
    {
        $user = new User('username', 500, 400);

        $this->dataProvider->getTopTenUsers()->willReturn(array_fill(0, 10, $user));

        $result = $this->getTopTenUsers();

        $result->shouldHaveCount(10);
        $result->shouldOnlyContainInstancesOf(User::class);
    }

    function it_should_get_consoles()
    {
        $console = new Console(3, 'Super Nintendo Entertainment System');

        $this->dataProvider->getConsoles()->willReturn(array_fill(0, 10, $console));

        $result = $this->getConsoles();

        $result->shouldHaveCount(10);
        $result->shouldOnlyContainInstancesOf(Console::class);
    }

    function it_should_get_games_for_a_console(GameFormatterInterface $gameFormatter)
    {
        $games = array_fill(0, 10, new Game(504, 'Super Mario Land', 4, ''));

        $consoleId = 1;

        $this->dataProvider->getGamesForConsole($consoleId)->willReturn($games);

        $gameFormatter->format($games)->shouldBeCalled();

        $this->getGamesForConsole($consoleId, $gameFormatter);

    }

    function it_should_get_game_info()
    {
        $gameId = 504;

        $game = new Game(
            $gameId,
            'Super Mario Land',
            4,
            'image-icon-1.jpg'
        );

        $this->dataProvider->getGameInfo($gameId)->willReturn($game);

        $this->getGameInfo($gameId);
    }

    public function getMatchers(): array
    {
        return [
            'onlyContainInstancesOf' => function ($subject, $key) {
                if (!is_iterable($subject)) {
                    return false;
                }
                foreach ($subject as $item) {
                    if (!$item instanceof $key) {
                        return false;
                    }
                }
                return true;
            },
        ];
    }
}
