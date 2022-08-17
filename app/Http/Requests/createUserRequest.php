<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            'username' => "required|string|max:20|unique:users,username,except,id",
            'first_name' => "bail|required|string|max:32",
            'last_name' => "bail|required|string|max:32",
            'phone' => "bail|required|string|max:20|unique:users,phone,except,id",
            'email' => "bail|required|email|unique:users,email,except,id",
            'password' => "bail|required|string|min:6|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,20}$/"
        ];
    }
}
