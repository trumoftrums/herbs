<?php

namespace Vanguard\Http\Requests\Invest;

use Vanguard\Http\Requests\Request;
use Vanguard\User;

class InvestTypeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ki_han' => 'required|numeric',
            'lai_suat' => 'required|numeric',
            'month-fr-01' => 'required|numeric',
            'month-to-01' => 'required|numeric',
            'percent-01' => 'required|numeric',
            'month-fr-02' => 'required|numeric',
            'month-to-02' => 'required|numeric',
            'percent-02' => 'required|numeric',
            'month-fr-03' => 'required|numeric',
            'month-to-03' => 'required|numeric',
            'percent-03' => 'required|numeric',
        ];
    }
}
