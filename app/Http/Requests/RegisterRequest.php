<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|unique:users,email',
            'name'=>'required|string|max:255',
            'password'=>'required|string|min:8',
            'confirm_password'=>'required|string|same:password',
            'address'=>'required|string|max:255',
            'phone'=>'required|string|max:10|min:10|unique:users,phone_number',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ];
    }
}
