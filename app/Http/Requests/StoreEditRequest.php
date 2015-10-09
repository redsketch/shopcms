<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class StoreEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone1' => 'numeric',
            'phone2' => 'numeric'
        ];
    }
}
