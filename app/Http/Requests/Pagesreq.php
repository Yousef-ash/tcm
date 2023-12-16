<?php

namespace App\Http\Requests;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Pagesreq extends FormRequest
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
        $pageId = $this->route('page');
        return [
            //
            'title' => 'required|string|max:255',
            'url' => [   Rule::unique('pages')->ignore($pageId, 'id'), 'max:255'],
            'view' => 'boolean',
            'show' => 'boolean',
            'hero' => 'boolean',
            'header' => 'boolean',
            'section' => 'boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'title.string' => 'العنوان يجب ان يكون قيمة نصية',
            'url.required' => 'الرابط مطلوب',
            'url.unique' => 'الرابط المدخل مستخدم بالفعل قم بتغييره',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'العنوان',
            'url' => 'الرابط',
            'content' => 'المحتوى',
        ];
    }
}
