<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=> 'required|string|max:20',
            'postnom'=> 'required|string|max:20',
            'prenom'=> 'required|string|max:20',
            'iddepartements'=> 'required|exists:departements',
        ];
    }
}
