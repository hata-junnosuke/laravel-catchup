<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRunningRecordRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'distance' => 'required|integer|min:0',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'date.required' => '日付は必須です。',
            'date.date' => '日付は有効な日付形式で入力してください。',
            'distance.required' => '距離は必須です。',
            'distance.integer' => '距離は整数で入力してください。',
            'distance.min' => '距離は0以上で入力してください。',
        ];
    }
}
