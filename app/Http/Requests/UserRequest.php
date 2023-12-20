<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        if ($this->routeIs('user.register')) {
            return [
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email|max:255',
                'password' => 'required|min:8',
            ];
        } elseif ($this->routeIs('user.login')) {
            return [
                'email'    => 'required|string|email|max:255',
                'password' => 'required|min:8',
            ];
        }
        return [];
    }
}
