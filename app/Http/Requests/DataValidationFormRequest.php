<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataValidationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "4mv_d20-d10" => 'nullable|numeric',
            "4mv_tpr_20-10" => 'required|numeric',
            "4mv_input-1" => 'nullable|numeric',
            "4mv_input-2" => 'nullable|numeric',
            "4mv_input-3" => 'nullable|numeric',
            "4mv_input-4" => 'nullable|numeric',
            "4mv_k_q-q0" => 'nullable|numeric',
            "6mv_d20-d10" => 'nullable|numeric',
            "6mv_tpr_20-10" => 'required|numeric',
            "6mv_input-1" => 'nullable|numeric',
            "6mv_input-2" => 'nullable|numeric',
            "6mv_input-3" => 'nullable|numeric',
            "6mv_input-4" => 'nullable|numeric',
            "6mv_k_q-q0" => 'nullable|numeric',
            "10mv_d20-d10" => 'nullable|numeric',
            "10mv_tpr_20-10" => 'required|numeric',
            "10mv_input-1" => 'nullable|numeric',
            "10mv_input-2" => 'nullable|numeric',
            "10mv_input-3" => 'nullable|numeric',
            "10mv_input-4" => 'nullable|numeric',
            "10mv_k_q-q0" => 'nullable|numeric',
            "15mv_d20-d10" => 'nullable|numeric',
            "15mv_tpr_20-10" => 'required|numeric',
            "15mv_input-1" => 'nullable|numeric',
            "15mv_input-2" => 'nullable|numeric',
            "15mv_input-3" => 'nullable|numeric',
            "15mv_input-4" => 'nullable|numeric',
            "15mv_k_q-q0" => 'nullable|numeric',
            "6mev_r50" => 'nullable|numeric',
            "6mev_input-1" => 'nullable|numeric',
            "6mev_input-2" => 'nullable|numeric',
            "6mev_input-3" => 'nullable|numeric',
            "6mev_input-4" => 'nullable|numeric',
            "6mev_k_q-qint" => 'nullable|numeric',
            "9mev_r50" => 'nullable|numeric',
            "9mev_input-1" => 'nullable|numeric',
            "9mev_input-2" => 'nullable|numeric',
            "9mev_input-3" => 'nullable|numeric',
            "9mev_input-4" => 'nullable|numeric',
            "9mev_k_q-qint" => 'nullable|numeric',
            "12mev_r50" => 'nullable|numeric',
            "12mev_input-1" => 'nullable|numeric',
            "12mev_input-2" => 'nullable|numeric',
            "12mev_input-3" => 'nullable|numeric',
            "12mev_input-4" => 'nullable|numeric',
            "12mev_k_q-qint" => 'nullable|numeric',
            "16mev_r50" => 'nullable|numeric',
            "16mev_input-1" => 'nullable|numeric',
            "16mev_input-2" => 'nullable|numeric',
            "16mev_input-3" => 'nullable|numeric',
            "16mev_input-4" => 'nullable|numeric',
            "16mev_k_q-qint" => 'nullable|numeric',
            "input-mmHg" => 'nullable|numeric',
            "input-mbar" => 'nullable|numeric',
            "output-mbar" => 'nullable|numeric',
            "output-mmHg" => 'nullable|numeric',
            "60co_input-1" => 'nullable|date',
            "60co_input-2" => 'nullable|numeric',
            "60co_input-3" => 'nullable|date',
            "60co_output-1" => 'nullable|numeric',
            "60co_output-2" => 'nullable|date',
            "60co_output-3" => 'nullable|numeric',
            "title" => 'required|max:100'
        ];
    }
}
