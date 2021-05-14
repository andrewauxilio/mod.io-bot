<?php

namespace Modio;

use InvalidArgumentException;
use Modio\Interfaces\ModbotInterface;

use function PHPUnit\Framework\throwException;

final class Modbot implements ModbotInterface {

    public $position;

    public $direction;

    const NORTH = 'y+1';

    const SOUTH = 'y-1';

    const EAST = 'x+1';

    const WEST = 'x-1';

    public function __construct(Array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): Modbot
    {
        switch ($this->direction) {
            case self::NORTH:
                $this->direction = self::EAST;
                break;
            case self::EAST:
                $this->direction = self::SOUTH;
                break;
            case self::SOUTH:
                $this->direction = self::WEST;
                break;
            case self::WEST:
                $this->direction = self::NORTH;
                break;
          }

        return $this;
    }

    public function turnLeft(): Modbot
    {
        switch ($this->direction) {
            case self::NORTH:
                $this->direction = self::WEST;
                break;
            case self::EAST:
                $this->direction = self::NORTH;
                break;
            case self::SOUTH:
                $this->direction = self::EAST;
                break;
            case self::WEST:
                $this->direction = self::SOUTH;
                break;
          }

        return $this;
    }

    public function advance(): Modbot
    {
        switch ($this->direction) {
            case self::NORTH:
                $this->position[1]++;
                break;
            case self::EAST:
                $this->position[0]++;
                break;
            case self::SOUTH:
                $this->position[1]--;
                break;
            case self::WEST:
                $this->position[0]--;
                break;
          }

        return $this;
    }

    public function instructions(string $commands): Modbot
    {
        $commandsArray = str_split($commands);
        
        foreach ($commandsArray as $command) {
            switch ($command) {
                case 'L':
                    $this->turnLeft();
                    break;
                case 'R':
                    $this->turnRight();
                    break;
                case 'A':
                    $this->advance();
                    break;
                default:
                    throw new InvalidArgumentException('Unkown command:' . $command);
              }
        }

        return $this;
    }
}