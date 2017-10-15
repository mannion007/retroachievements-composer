<?php namespace JoeStrong\RetroAchievements\Game;

interface GameFormatterInterface
{
    /**
     * @param Game[] $games
     * @return string
     */
    public function format(array $games) : string;
}
