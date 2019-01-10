<?php

namespace app\commands\generate;

use Kenjis\CodeIgniter_Cli\Command\Command;
use Aura\Cli\Status;

class EloquentModel extends Command
{

    public function __invoke($type, $classname)
    {
        if ($classname === null) {
            $this->stdio->errln(
                    '<<red>>Classname is needed<<reset>>'
            );
            $this->stdio->errln(
                    '  eg, generate EloquentModel User'
            );
            return Status::USAGE;
        }

        $eloquentModelPath = APPPATH . 'models/eloquent/';

        $file_path = $this->generateFilename(
                $eloquentModelPath, $classname
        );

        // check file exist
        if (file_exists($file_path)) {
            $this->stdio->errln(
                    "<<red>>The file \"$file_path\" already exists<<reset>>"
            );
            return Status::FAILURE;
        }

        // check class exist
        foreach (glob($eloquentModelPath . '*_*.php') as $file) {
            $name = basename($file, '.php');
            if (strtolower($name) === strtolower($classname)) {
                $this->stdio->errln(
                        "<<red>>The Class \"$match[1]\" already exists<<reset>>"
                );
                return Status::FAILURE;
            }
        }

        $template  = file_get_contents(__DIR__ . '/templates/EloquentModel.txt');
        $search    = [
            '@@classname@@',
            '@@date@@',
        ];
        $replace   = [
            $classname,
            date('Y/m/d H:i:s'),
        ];
        $output    = str_replace($search, $replace, $template);
        $generated = @file_put_contents($file_path, $output, LOCK_EX);

        if ($generated !== false) {
            $this->stdio->outln('<<green>>Generated: ' . $file_path . '<<reset>>');
        } else {
            $this->stdio->errln(
                    "<<red>>Can't write to \"$file_path\"<<reset>>"
            );
            return Status::FAILURE;
        }
    }

    private function generateFilename($eloquentModelPath, $classname)
    {
        return $eloquentModelPath . $classname . '.php';
    }

}
