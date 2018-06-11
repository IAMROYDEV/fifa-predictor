<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMatchRequest extends FormRequest {
    /*
     * Validator instance updated on failedValidation
     *
     * @var \Illuminate\Contracts\Validation\Validator
     */

    public $validator = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Override Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) {

        $this->validator = $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'played_date' =>'required|date_format:Y-m-d H:i:s',
            'world_cup_id' => 'integer|exists:world_cups,id',
            'team1' => 'integer|exists:teams,id',
            'team2' => 'integer|exists:teams,id',
            'team1_score' => 'nullable|integer',
            'team2_score' => 'nullable|integer',
        ];
    }

}
