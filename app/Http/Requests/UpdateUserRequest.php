<?php

namespace App\Http\Requests;

use App\DTO\UserUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Авторизация проверяется в контроллере/политиках
    }

    /**
     * Правила валидации
     */
    public function rules(): array
    {
        return [
            'login' => 'sometimes|string|max:255|unique:users,login,'.$this->user->id,
            'email' => 'sometimes|email|max:255|unique:users,email,'.$this->user->id,
        ];
    }

    /**
     * Преобразование в DTO
     */
    public function toDto(): UserUpdateData
    {
        return new UserUpdateData(
            login: $this->input('login'),
            email: $this->input('email')
        );
    }

    /**
     * Кастомные сообщения об ошибках
     */
    public function messages(): array
    {
        return [
            'login.unique' => 'Этот логин уже занят',
            'email.unique' => 'Этот email уже используется',
        ];
    }
}