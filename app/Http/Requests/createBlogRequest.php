<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createBlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'title' => 'bail|required|string|max:550',
            'is_published' => 'bail|required|boolean',
            'summary' => 'bail|required|string|max:550',
            'content' => 'bail|required|string|max:60000',
            'categories' => 'bail|required|array',
            'tags' => 'bail|required|array',
            'categories.*' => 'bail|required|integer',
            'tags.*' => 'bail|required|integer',
        ];
    }
}
