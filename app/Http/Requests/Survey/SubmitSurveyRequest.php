<?php

namespace App\Http\Requests\Survey;

use App\Http\Requests\JsonFormRequest;

class SubmitSurveyRequest extends JsonFormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'survey_id'        => 'required|numeric|exists:surveys,id',
            'answers'          => 'required|array',
            'answers.*.id'     => 'required|numeric|exists:questions,id',
            'answers.*.answer' => 'required|string|in:Yes,No',
            'notes'            => 'nullable|array',
            'notes.*'          => 'required|string',
        ];
    }
}
