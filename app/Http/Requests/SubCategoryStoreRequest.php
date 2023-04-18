<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'parent' => 'required',
            'title' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'parent.required' => 'required',
            'title.required' => 'required'
        ];
    }
}
