<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'nullable|string|max:255',
            'dni' => 'nullable|string|max:20|unique:profiles,dni,' . $this->user()->id . ',user_id',
            'identification' => 'nullable|in:dni,passport,nie',
            'nationality' => 'nullable|string|max:255',
            'maritalStatus' => 'nullable|in:single,married,divorced,widower,other',
            'gender' => 'nullable|in:male,female,other',
            'birthDate' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'residence' => 'nullable|string|max:255',
            'zipCode' => 'nullable|string|max:10',
            'province' => 'nullable|string|max:255',
            'locality' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'surname.string' => 'El apellido debe ser un texto.',
            'surname.max' => 'El apellido no puede exceder 255 caracteres.',
            'dni.string' => 'El DNI debe ser un texto.',
            'dni.max' => 'El DNI no puede exceder 20 caracteres.',
            'dni.unique' => 'El DNI ya existe.',
            'identification.in' => 'El tipo de identificación debe ser: DNI, Pasaporte o NIE.',
            'nationality.string' => 'La nacionalidad debe ser un texto.',
            'nationality.max' => 'La nacionalidad no puede exceder 255 caracteres.',
            'maritalStatus.in' => 'El estado civil debe ser: soltero, casado, divorciado, viudo u otro.',
            'gender.in' => 'El género debe ser: masculino, femenino u otro.',
            'birthDate.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'phone.string' => 'El teléfono debe ser un texto.',
            'phone.max' => 'El teléfono no puede exceder 20 caracteres.',
            'residence.string' => 'La residencia debe ser un texto.',
            'residence.max' => 'La residencia no puede exceder 255 caracteres.',
            'zipCode.string' => 'El código postal debe ser un texto.',
            'zipCode.max' => 'El código postal no puede exceder 10 caracteres.',
            'province.string' => 'La provincia debe ser un texto.',
            'province.max' => 'La provincia no puede exceder 255 caracteres.',
            'locality.string' => 'La localidad debe ser un texto.',
            'locality.max' => 'La localidad no puede exceder 255 caracteres.',
            'country.string' => 'El país debe ser un texto.',
            'country.max' => 'El país no puede exceder 255 caracteres.',
        ];
    }
}
