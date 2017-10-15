<?php

namespace JoeStrong\RetroAchievements\Game\Formatter;

use JoeStrong\RetroAchievements\Game\Game;
use JoeStrong\RetroAchievements\Game\GameFormatterInterface;

class JsonGameFormatter implements GameFormatterInterface
{
    /**
     * @param Game[] $games
     * @return string
     */
    public function format(array $games): string
    {
        $formatted = [];

        foreach ($games as $game) {
            $formatted[] = sprintf('{"title":"%s"}', $game->getTitle());
        }

        return implode(',', $formatted);
    }
}
