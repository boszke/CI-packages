<?php

namespace app\models\eloquent;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class LoremModel extends EloquentModel {

    const TABLE_NAME = '';
    
    const COLUMN_ID = 'id';

    protected $table = self::TABLE_NAME;
    
    protected $fillable = [
        
    ];

    public $timestamps = false;
}
