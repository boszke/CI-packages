<?php

namespace app\models\eloquent;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Test extends EloquentModel
{
    const TABLE_NAME = 'test';
    
    const COLUMN_NAME    = 'name';

    protected $table = self::TABLE_NAME;
    
    protected $fillable = [
        self::COLUMN_NAME,
    ];
    public $timestamps = false;

}
