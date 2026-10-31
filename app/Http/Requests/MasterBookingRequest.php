<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'master' => ['required', 'in:hair,nails,makeup'],
            'message' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введіть ваше ім’я.',
            'email.required' => 'Введіть електронну пошту.',
            'email.email' => 'Email введено некоректно.',
            'master.required' => 'Оберіть майстра.',
            'master.in' => 'Обрано неправильного майстра.',
            'message.required' => 'Введіть повідомлення.',
        ];
    }
}
