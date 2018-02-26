<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndiceR50 extends Model
{
    protected $table = 'indices_r50';
    public $timestamps = false;
    protected $fillable = [
        'mev', 
        'r50', 
        'input_1', 
        'input_2', 
        'input_3', 
        'input_4', 
        'spreadsheet_id'
    ];

    private static $MeV = ['6', '9', '12', '16'];

    public static function getMeVs() {
        return self::$MeV;
    }
}
