<?php

namespace Vanguard\Http\Requests\Invest;

use Vanguard\Http\Requests\Request;
use Vanguard\User;

class BienDongRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fr' => 'required|date',
            'to' => 'required|date',
            'interest' => 'required|numeric',
        ];
    }
}
