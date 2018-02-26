<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversaoUnidPressao extends Model
{
    protected $table = 'conversoes_unid_pressao';
    public $timestamps = false;
    protected $fillable = [
        'input_1', 
        'input_2', 
        'input_3', 
        'spreadsheet_id'
    ];
}
