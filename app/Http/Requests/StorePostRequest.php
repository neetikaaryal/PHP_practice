<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'image' => 'required|image|max:2048', // Limit the image size to 2MB
            'tag' => 'required',
            'type' => 'required',
            'status' => 'required',
        ];
        
    }

    public function messages(): array
{
    return [
        'title.required' => 'Title is required',
        'description.required' => 'Description is required',
        'author.required' => 'Author is required',
        'image.required' => 'Image is required',
        'tag.required' => 'Tag is required',
        'type.required' => 'Type is required',
        'status.required' => 'Status is required',
    ];
}

}
