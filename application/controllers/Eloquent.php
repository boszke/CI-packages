<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use app\models\eloquent\Test;

class Eloquent extends CI_Controller
{
    public function index()
    {
        $this->output->enable_profiler(true);
        $query = $this->do_testow(1);
        print_r($query);
    }
    
    public function do_testow($id) {
        $id = (int)$id;
        
        $result = Test::find($id);
        
        echo $result->name;
    }
}
