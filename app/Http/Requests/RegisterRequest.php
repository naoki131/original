<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        
            'password' => ['required', 'string', 'min:8'],
           
            'email' => ['required',Rule::unique('users')->ignore(Auth::id()),'email','string'],
            'name' => ['required','string','max:30'],
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
}
