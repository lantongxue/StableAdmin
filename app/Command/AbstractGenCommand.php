<?php

namespace App\Command;

use Hyperf\Command\Command;

abstract class AbstractGenCommand extends Command
{
    abstract public function getCommandName();
}