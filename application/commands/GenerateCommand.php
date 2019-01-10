<?php
/**
 * Part of Cli for CodeIgniter
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/codeigniter-cli
 */

use Aura\Cli\Status;
use Kenjis\CodeIgniter_Cli\Command\Command;

class GenerateCommand extends Command
{
    public function __invoke($type, $classname = null)
    {
        $generator = 'app\\commands\\generate\\' . ucfirst($type);
        if (! class_exists($generator)) {
            $this->stdio->errln(
                '<<red>>No such generator class: ' . $generator . '<<reset>>'
            );
            return Status::FAILURE;
        }

        $command = new $generator($this->context, $this->stdio, $this->ci);
        return $command($type, $classname);
    }
}
