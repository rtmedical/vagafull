<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversaoUnidPressao extends Model
{
    protected $table = 'conversoes_unid_pressao';
    public $timestamps = false;
    protected $fillable = [
        'mmhg', 
        'mbar', 
        'spreadsheet_id'
    ];
}
