<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumericSpaces;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEventRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'unique:events',
                new AlphaNumericSpaces()
            ],
            'from_date' => ['bail', 'required', 'date_format:Y-m-d'],
            'to_date' => ['bail', 'required', 'date_format:Y-m-d']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
