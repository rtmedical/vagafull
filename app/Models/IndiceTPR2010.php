<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndiceTPR2010 extends Model
{
    protected $table = 'indices_tpr2010';
    public $timestamps = false;
    protected $fillable = [
        'mv', 
        'd20_d10', 
        'input_1', 
        'input_2', 
        'input_3', 
        'input_4', 
        'spreadsheet_id'
    ];

    private static $MV = ['4', '6', '10', '15'];

    public static function getMVs() {
        return self::$MV;
    }
}
