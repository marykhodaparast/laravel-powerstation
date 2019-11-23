<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class newsUpdateRequest extends FormRequest
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
            'title'=>'required|min:3|max:255',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,gif|max:2048',
            'video'=>'nullable|mimes:mp4,mov,ogg,qt',
        ];
    }
}
