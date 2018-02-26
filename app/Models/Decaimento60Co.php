<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decaimento60Co extends Model
{
    protected $table = 'decaimentos_60co';
    public $timestamps = false;
    protected $fillable = [
        'mmhg', 
        'mbar', 
        'spreadsheet_id'
    ];
}
