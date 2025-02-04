<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed|min:5',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff,avif|max:2048',
            'document' => [
                'nullable',
                'file',
                'mimes:pdf,jpeg,jpg,png,webp,tiff,jiff,avif,doc,docx,xls,xlsx,txt,rtf,dcm', 
                'max:5240', // Max file size (5 MB, adjust as needed)
            ],
            'phone' => 'required|min:9',
            'whatsapp' => 'min:9',
            'Nationality' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before_or_equal:today'
        ];
    }
}
