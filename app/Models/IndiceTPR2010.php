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
        'tpr_2010',
        'input_1', 
        'input_2', 
        'input_3', 
        'input_4', 
        'k_qq0',
        'spreadsheet_id'
    ];

    private static $MVs = ['4', '6', '10', '15'];

    public static function getMVs() {
        return self::$MVs;
    }

    public function updateData($data)
    {
        $this->d20_d10 = $data['d20_d10'];
        $this->tpr_2010 = $data['tpr_2010'];
        $this->input_1 = $data['input_1'];
        $this->input_2 = $data['input_2'];
        $this->input_3 = $data['input_3'];
        $this->input_4 = $data['input_4'];
        $this->k_qq0 = $data['k_qq0'];
    }
}
