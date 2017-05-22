<?php

namespace Vanguard\Http\Requests\Invest;

use Vanguard\Http\Requests\Request;
use Vanguard\User;

class NewsRequest extends Request
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
            'fileimg' => 'required',
            'summary' => 'required',
            'description' => 'required'
        ];
    }
}
