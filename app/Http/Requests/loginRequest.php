<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'default';

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'email|required_if:username,null',
            'username' => 'bail|required_if:email,null|string',
            'password' => 'bail|required|string',
        ];
    }
}
