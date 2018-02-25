<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndiceTPR2010 extends Model
{
    protected $table = 'indices_tpr2010';
    public $timestramps = false;

    private static $MV = ['4', '6', '10', '15'];

    public static function getMVs() {
        return self::$MV;
    }
}
