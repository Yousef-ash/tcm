<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|max:255',
        ];
    }
    public function messages(): array
{
    return [
        'title.required' => 'العنوان مطلوب',
        'title.string' => 'العنوان يجب ان يكون قيمة نصية',
        'content.required' => 'المحتوى مطلوب',
        'caption.required' => 'النبذة مطلوبة',
    ];
}

public function attributes(): array
{
    return [
        'title' => 'العنوان',
        'content' => 'المحتوى',
    ];
}
}
