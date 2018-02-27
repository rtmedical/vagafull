<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversaoUnidPressao extends Model
{
    protected $table = 'conversoes_unid_pressao';
    public $timestamps = false;
    protected $fillable = [
        'input_mmhg', 
        'input_mbar', 
        'output_mbar', 
        'output_mmhg', 
        'spreadsheet_id'
    ];

    public function updateData($data)
    {
        $this->input_mmhg = $data['input_mmhg'];
        $this->input_mbar = $data['input_mbar'];
        $this->output_mbar = $data['output_mbar'];
        $this->output_mmhg = $data['output_mmhg'];
    }
}
