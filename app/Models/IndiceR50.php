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

    public function updateData($data)
    {
        $this->r50 = $data['r50'];
        $this->input_1 = $data['input_1'];
        $this->input_2 = $data['input_2'];
        $this->input_3 = $data['input_3'];
        $this->input_4 = $data['input_4'];
    }
}
