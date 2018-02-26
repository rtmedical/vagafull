<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decaimento60Co extends Model
{
    protected $table = 'decaimentos_60co';
    public $timestamps = false;
    protected $fillable = [
        'input_1', 
        'input_2', 
        'input_3', 
        'spreadsheet_id'
    ];

    public function updateData($data)
    {
        $this->input_1 = $data['input_1'];
        $this->input_2 = $data['input_2'];
        $this->input_3 = $data['input_3'];
    }
}
