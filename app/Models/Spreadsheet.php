<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spreadsheet extends Model
{
    public function indices_tpr2010() {
        return $this->hasMany(IndiceTPR2010::class); 
    }

    public function indices_r50() {
        return $this->hasMany(IndiceR50::class); 
    }

    public function conversao_unid_pressao() {
        return $this->hasOne(ConversaoUnidPressao::class);
    }

    public function decaimento_60Co() {
        return $this->hasOne(Decaimento60Co::class);
    }
}
