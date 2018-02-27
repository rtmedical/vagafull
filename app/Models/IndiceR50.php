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
        'k_qqint',
        'spreadsheet_id'
    ];

    private static $MeVs = ['6', '9', '12', '16'];

    public static function getMeVs() {
        return self::$MeVs;
    }

    public function updateData($data)
    {
        $this->r50 = $data['r50'];
        $this->input_1 = $data['input_1'];
        $this->input_2 = $data['input_2'];
        $this->input_3 = $data['input_3'];
        $this->input_4 = $data['input_4'];
        $this->k_qqint = $data['k_qqint'];
    }
}
