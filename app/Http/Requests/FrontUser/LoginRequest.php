<?php

namespace App\Http\Requests\FrontUser;

use App\Http\Requests\CoreRequest;
class LoginRequest extends CoreRequest
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
            'email'	    => 'required|email',
            'password'	=>	'required'
        ];
    }

}
