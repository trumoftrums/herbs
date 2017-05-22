<?php

namespace Vanguard\Http\Requests\Invest;

use Vanguard\Http\Requests\Request;

class CreateInvestRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'investTypeID' => 'required|min:1',
            'money' => 'required|min:7',
            'estStartDate' =>'required|length:10',
        ];
    }
}
