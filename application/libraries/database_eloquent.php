<?php

class database_eloquent
{

    public function __construct()
    {
        $ci      = &get_instance();
        $db      = $ci->db;
        $capsule = new Illuminate\Database\Capsule\Manager();

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $db->hostname,
            'database'  => $db->database,
            'username'  => $db->username,
            'password'  => $db->password,
            'charset'   => $db->char_set,
            'collation' => $db->dbcollat,
            'prefix'    => $db->dbprefix,
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

}
