<?php namespace JoeStrong\RetroAchievements\Game\Formatter;

use JoeStrong\RetroAchievements\Game\Game;
use JoeStrong\RetroAchievements\Game\GameFormatterInterface;

class HtmlGameFormatter implements GameFormatterInterface
{
    /**
     * @param Game[] $games
     * @return string
     */
    public function format(array $games): string
    {
        $formatted = [];

        foreach ($games as $game) {
            $formatted[] =  $game->getTitle();
        }

        return implode('<br>', $formatted);
    }
}
