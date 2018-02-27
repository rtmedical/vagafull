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
            "4mv_input-1" => 'nullable|numeric',
            "4mv_input-2" => 'nullable|numeric',
            "4mv_input-3" => 'nullable|numeric',
            "4mv_input-4" => 'nullable|numeric',
            "6mv_d20-d10" => 'nullable|numeric',
            "6mv_input-1" => 'nullable|numeric',
            "6mv_input-2" => 'nullable|numeric',
            "6mv_input-3" => 'nullable|numeric',
            "6mv_input-4" => 'nullable|numeric',
            "10mv_d20-d10" => 'nullable|numeric',
            "10mv_input-1" => 'nullable|numeric',
            "10mv_input-2" => 'nullable|numeric',
            "10mv_input-3" => 'nullable|numeric',
            "10mv_input-4" => 'nullable|numeric',
            "15mv_d20-d10" => 'nullable|numeric',
            "15mv_input-1" => 'nullable|numeric',
            "15mv_input-2" => 'nullable|numeric',
            "15mv_input-3" => 'nullable|numeric',
            "15mv_input-4" => 'nullable|numeric',
            "6mev_r50" => 'nullable|numeric',
            "6mev_input-1" => 'nullable|numeric',
            "6mev_input-2" => 'nullable|numeric',
            "6mev_input-3" => 'nullable|numeric',
            "6mev_input-4" => 'nullable|numeric',
            "9mev_r50" => 'nullable|numeric',
            "9mev_input-1" => 'nullable|numeric',
            "9mev_input-2" => 'nullable|numeric',
            "9mev_input-3" => 'nullable|numeric',
            "9mev_input-4" => 'nullable|numeric',
            "12mev_r50" => 'nullable|numeric',
            "12mev_input-1" => 'nullable|numeric',
            "12mev_input-2" => 'nullable|numeric',
            "12mev_input-3" => 'nullable|numeric',
            "12mev_input-4" => 'nullable|numeric',
            "16mev_r50" => 'nullable|numeric',
            "16mev_input-1" => 'nullable|numeric',
            "16mev_input-2" => 'nullable|numeric',
            "16mev_input-3" => 'nullable|numeric',
            "16mev_input-4" => 'nullable|numeric',
            "input-mmHg" => 'nullable|numeric',
            "input-mbar" => 'nullable|numeric',
            "60co_input-1" => 'nullable|date',
            "60co_input-2" => 'nullable|numeric',
            "60co_input-3" => 'nullable|date',
            "title" => 'required|max:100'
        ];
    }
}
