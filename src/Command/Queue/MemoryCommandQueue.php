<?php

/**
 * GpsLab component.
 *
 * @author    Peter Gribanov <info@peter-gribanov.ru>
 * @copyright Copyright (c) 2011, Peter Gribanov
 * @license   http://opensource.org/licenses/MIT
 */

namespace GpsLab\Component\Command\Queue;

use GpsLab\Component\Command\Command;

class MemoryCommandQueue implements CommandQueue
{
    /**
     * @var Command[]
     */
    private $commands = [];

    /**
     * Push command to queue.
     *
     * @param Command $command
     *
     * @return bool
     */
    public function push(Command $command)
    {
        $this->commands[] = $command;

        return true;
    }

    /**
     * Pop command from queue. Return NULL if queue is empty.
     *
     * @return Command|null
     */
    public function pop()
    {
        return array_shift($this->commands);
    }
}
