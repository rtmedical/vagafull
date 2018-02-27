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

    public static function saveData($data) 
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
                $key = 'validation.attributes.title';
                return [
                    'success' => false,
                    'message' => __('validation.unique', [
                        'attribute' => __($key) !== $key ? __($key) : 'title'
                    ])
                ];
            }
        }
        $OK = !!$spreadsheet;

        if(!$OK) 
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => __('database.unknown_fail')
            ];
        }

        $mvs = IndiceTPR2010::getMVs();
        foreach($mvs as $mv) 
        {
            $result = IndiceTPR2010::create([
                'mv' => $mv,
                'd20_d10' => $data[$mv.'mv_d20-d10'],
                'tpr_2010' => $data[$mv.'mv_tpr_20-10'],
                'input_1' => $data[$mv.'mv_input-1'],
                'input_2' => $data[$mv.'mv_input-2'],
                'input_3' => $data[$mv.'mv_input-3'],
                'input_4' => $data[$mv.'mv_input-4'],
                'k_qq0' => $data[$mv.'mv_k_q-q0'],
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
                'k_qqint' => $data[$mev.'mev_k_q-qint'],
                'spreadsheet_id' => $spreadsheet->id
            ]);
            $OK = $OK && !!$result;
        }

        $result = ConversaoUnidPressao::create([
            'input_mmhg' => $data['input-mmHg'],
            'input_mbar' => $data['input-mbar'],
            'output_mbar' => $data['output-mbar'],
            'output_mmhg' => $data['output-mmHg'],
            'spreadsheet_id' => $spreadsheet->id
        ]);
        $OK = $OK && !!$result;

        $result = Decaimento60Co::create([
            'input_1' => $data['60co_input-1'],
            'input_2' => $data['60co_input-2'],
            'input_3' => $data['60co_input-3'],
            'output_1' => $data['60co_output-1'],
            'output_2' => $data['60co_output-2'],
            'output_3' => $data['60co_output-3'],
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
                'message' => __('database.unknown_fail')
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
                'tpr_2010' => $data[$mv.'mv_tpr_20-10'],
                'input_1' => $data[$mv.'mv_input-1'],
                'input_2' => $data[$mv.'mv_input-2'],
                'input_3' => $data[$mv.'mv_input-3'],
                'input_4' => $data[$mv.'mv_input-4'],
                'k_qq0' => $data[$mv.'mv_k_q-q0']
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
                'input_4' => $data[$mev.'mev_input-4'],
                'k_qqint' => $data[$mev.'mev_k_q-qint']
            ]);
        }

        $spreadsheet->conversao_unid_pressao->updateData([
            'input_mmhg' => $data['input-mmHg'],
            'input_mbar' => $data['input-mbar'],
            'output_mbar' => $data['output-mbar'],
            'output_mmhg' => $data['output-mmHg']
        ]);

        $spreadsheet->decaimento_60Co->updateData([
            'input_1' => $data['60co_input-1'],
            'input_2' => $data['60co_input-2'],
            'input_3' => $data['60co_input-3'],
            'output_1' => $data['60co_output-1'],
            'output_2' => $data['60co_output-2'],
            'output_3' => $data['60co_output-3']
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
                $key = 'validation.attributes.title';
                return [
                    'success' => false,
                    'message' => __('validation.unique', [
                        'attribute' => __($key) !== $key ? __($key) : 'title'
                    ])
                ];
            }
            return [
                'success' => false,
                'message' => __('database.unknown_fail')
            ];
        }

        DB::commit();
        return [
            'success' => true,
            'data' => $spreadsheet->id
        ];
    }
}
