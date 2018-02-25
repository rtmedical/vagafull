<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndiceR50 extends Model
{
    protected $table = 'indices_r50';
    public $timestramps = false;

    private static $MeV = ['6', '9', '12', '16'];

    public static function getMeVs() {
        return self::$MeV;
    }
}
