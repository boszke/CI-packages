<?php

use Kenjis\CodeIgniter_Cli\Command\Command;

/**
 * @property \CI_Loader $load
 * @property \CI_Config $config
 */
class TestCommand extends Command
{

    public function __invoke()
    {
        $this->stdio->outln('<<green>>This is TestCommand class<<reset>>');
    }

}
