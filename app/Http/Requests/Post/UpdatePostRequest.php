<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3|exists:posts,title|unique:posts,title,'.$this->post->id,
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'must be > 3 Chars',
            'description.required' => 'Description Required',
            'description.min' => 'Description must be > 10 Chars',
        ];
    }
}
