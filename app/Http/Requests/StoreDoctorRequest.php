<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'profile_image' => 'required|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff,avif|max:2048',
            'phone' => 'required|min:9',
            'whatsapp' => 'min:9',
            'Nationality' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'license_number' => 'required|string',
            'dob' => 'required|date|before_or_equal:today',
            'specialty_id' => 'required|integer',
            'consultation_fee' => 'required|integer',
            'experience' => 'required|integer',
            'hospital' => 'required|string',
            'payment_number' => 'required|integer',
            'payment_type' => 'required|string',
            'facebook' => 'nullable|string',
            'telegram' => 'nullable|string',
            'descriptions' => 'string',
        ];
    }
}
