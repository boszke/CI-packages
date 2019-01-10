<?php

namespace app\models\eloquent;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Test extends EloquentModel
{
    use \Sofa\Eloquence\Eloquence;
    use \Sofa\Eloquence\Mappable;
    
    const TABLE_NAME = 'test';
    
    const COLUMN_NAME    = 'name';

    protected $table = self::TABLE_NAME;
    
    protected $maps = [
        'friendlyName' => 'name',
    ];
    
    protected $fillable = [
        self::COLUMN_NAME,
    ];
    
    public $timestamps = false;
}
