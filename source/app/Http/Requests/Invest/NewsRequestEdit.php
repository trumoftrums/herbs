<?php

namespace Vanguard\Http\Requests\Invest;

use Vanguard\Http\Requests\Request;
use Vanguard\User;

class NewsRequestEdit extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required'
        ];
    }
}
