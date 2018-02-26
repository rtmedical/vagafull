<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class Spreadsheet extends Model
{
    protected $fillable = ['title'];

    public function indices_tpr2010() 
    {
        return $this->hasMany(IndiceTPR2010::class); 
    }

    public function indices_r50() 
    {
        return $this->hasMany(IndiceR50::class); 
    }

    public function conversao_unid_pressao() 
    {
        return $this->hasOne(ConversaoUnidPressao::class);
    }

    public function decaimento_60Co() 
    {
        return $this->hasOne(Decaimento60Co::class);
    }

    public function saveData($data) 
    {
        $OK = false;
        $result = null;
        $spreadsheet = null;

        DB::beginTransaction();

        try 
        {
            $spreadsheet = self::create(['title' => $data['title']]);
        } 
        catch(QueryException $e)
        {   
            if($e->getCode() == '23000')
            {
                DB::rollback();
                return [
                    'success' => false,
                    'message' => 'The title must be unique.'
                ];
            }
        }
        $OK = !!$spreadsheet;

        if(!$OK) 
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Something went wrong while saving the data. Please, try again later.'
            ];
        }

        $mvs = IndiceTPR2010::getMVs();
        foreach($mvs as $mv) 
        {
            $result = IndiceTPR2010::create([
                'mv' => $mv,
                'd20_d10' => $data[$mv.'mv_d20-d10'],
                'input_1' => $data[$mv.'mv_input-1'],
                'input_2' => $data[$mv.'mv_input-2'],
                'input_3' => $data[$mv.'mv_input-3'],
                'input_4' => $data[$mv.'mv_input-4'],
                'spreadsheet_id' => $spreadsheet->id
            ]);
            $OK = $OK && !!$result;
        }

        $mevs = IndiceR50::getMeVs();
        foreach($mevs as $mev) 
        {
            $result = IndiceR50::create([
                'mev' => $mev,
                'r50' => $data[$mev.'mev_r50'],
                'input_1' => $data[$mev.'mev_input-1'],
                'input_2' => $data[$mev.'mev_input-2'],
                'input_3' => $data[$mev.'mev_input-3'],
                'input_4' => $data[$mev.'mev_input-4'],
                'spreadsheet_id' => $spreadsheet->id
            ]);
            $OK = $OK && !!$result;
        }

        $result = ConversaoUnidPressao::create([
            'mmhg' => $data['input-mmHg'],
            'mbar' => $data['input-mbar'],
            'spreadsheet_id' => $spreadsheet->id
        ]);
        $OK = $OK && !!$result;

        $result = Decaimento60Co::create([
            'input_1' => $data['60co_input-1'],
            'input_2' => $data['60co_input-2'],
            'input_3' => $data['60co_input-3'],
            'spreadsheet_id' => $spreadsheet->id
        ]);
        $OK = $OK && !!$result;

        if ($OK)
        {
            DB::commit();
            return [
                'success' => true,
                'data' => $spreadsheet->id
            ];
        }
        else
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Something went wrong while saving the data. Please, try again later.'
            ];
        }
    }

    public function updateData($data, $spreadsheet) 
    {
        DB::beginTransaction();

        $spreadsheet->title = $data['title'];
        
        $mvs = IndiceTPR2010::getMVs();
        foreach($mvs as $idx=>$mv) 
        {
            $spreadsheet->indices_tpr2010[$idx]->updateData([
                'd20_d10' => $data[$mv.'mv_d20-d10'],
                'input_1' => $data[$mv.'mv_input-1'],
                'input_2' => $data[$mv.'mv_input-2'],
                'input_3' => $data[$mv.'mv_input-3'],
                'input_4' => $data[$mv.'mv_input-4']
            ]);
        }

        $mevs = IndiceR50::getMeVs();
        foreach($mevs as $idx=>$mev) 
        {
            $spreadsheet->indices_r50[$idx]->updateData([
                'r50' => $data[$mev.'mev_r50'],
                'input_1' => $data[$mev.'mev_input-1'],
                'input_2' => $data[$mev.'mev_input-2'],
                'input_3' => $data[$mev.'mev_input-3'],
                'input_4' => $data[$mev.'mev_input-4']
            ]);
        }

        $spreadsheet->conversao_unid_pressao->updateData([
            'mmhg' => $data['input-mmHg'],
            'mbar' => $data['input-mbar']
        ]);

        $spreadsheet->decaimento_60Co->updateData([
            'input_1' => $data['60co_input-1'],
            'input_2' => $data['60co_input-2'],
            'input_3' => $data['60co_input-3']
        ]);

        try
        {
            $spreadsheet->save();
            $spreadsheet->indices_tpr2010()
                ->saveMany($spreadsheet->indices_tpr2010);
            $spreadsheet->indices_r50()
                ->saveMany($spreadsheet->indices_r50);
            $spreadsheet->conversao_unid_pressao->save();
            $spreadsheet->decaimento_60Co->save();
        }
        catch(QueryException $e)
        {   
            DB::rollBack();
            if($e->getCode() == '23000')
            {
                return [
                    'success' => false,
                    'message' => 'The title must be unique.'
                ];
            }
            return [
                'success' => false,
                'message' => 'Something went wrong while saving the data. Please, try again later.'
            ];
        }

        DB::commit();
        return [
            'success' => true,
            'data' => $spreadsheet->id
        ];
    }
}
