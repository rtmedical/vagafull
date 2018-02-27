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
        'output_1', 
        'output_2', 
        'output_3', 
        'spreadsheet_id'
    ];

    public function updateData($data)
    {
        $this->input_1 = $data['input_1'];
        $this->input_2 = $data['input_2'];
        $this->input_3 = $data['input_3'];
        $this->output_1 = $data['output_1'];
        $this->output_2 = $data['output_2'];
        $this->output_3 = $data['output_3'];
    }
}
