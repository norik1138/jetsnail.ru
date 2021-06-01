<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DriverRequest extends FormRequest
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
      $rules = [
        'name' => 'required|min:3|max:255',
        'email' => [
            'required',
            'min:3',
            'max:255',
            'email',
        ],
      ];

      if (!empty($this->user)) {
        $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
      } else {
        $rules['email'][] = Rule::unique('users');
      }

      return $rules;
    }
}
