<?php

namespace App\Http\Requests;

use http\Env\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    private $rules;

    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        dump($this->rules);
        return $this->rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $data = [
            'code' => 422,
            'message' => 'Validation error',
            "errors" => [
                'login' => 'invalid credentials'
            ],
        ];

        return response()->json(['error'=>$data], 401);
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        dump("oi");
    }
}
