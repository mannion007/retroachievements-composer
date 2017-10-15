<?php

namespace spec\JoeStrong\RetroAchievements\Game\Formatter;

use JoeStrong\RetroAchievements\Game\Formatter\JsonGameFormatter;
use JoeStrong\RetroAchievements\Game\Game;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonGameFormatterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(JsonGameFormatter::class);
    }

    function it_formats_games_as_html()
    {
        $games = [
            new Game(1, 'Street Fighter 2 Turbo', 2, 'image-icon-1.jpg'),
            new Game(1, 'James Pond: Robocod', 1, 'image-icon-2.jpg'),
            new Game(1, 'Kid Chameleon', 3, 'image-icon-3.jpg')
        ];

        $this->format($games)->shouldReturn('{"title":"Street Fighter 2 Turbo"},{"title":"James Pond: Robocod"},{"title":"Kid Chameleon"}');
    }
}
