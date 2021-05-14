<?php

namespace Modio;

use Modio\Interfaces\ModbotInterface;

final class Modbot implements ModbotInterface {

    public $position;

    public function __construct(array $position, string $commands)
    {
        $this->$position = $position;
        $this->instructions($commands);
    }

    public static function NORTH()
    {

    }

    public function turnRight()
    {

    }

    public function turnLeft()
    {

    }

    public function advance()
    {

    }

    public function instructions(string $commands)
    {

    }
}