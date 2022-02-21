<?php

namespace App\Http\Requests\Survey;


use App\Http\Requests\JsonFormRequest;

class QuestionIdRequest extends JsonFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'survey_id' => 'required|string|exists:surveys,id',
            'id'        => 'required|string|exists:questions,id',
            'answer'    => 'required|string|in:Yes,No',
        ];
    }
}
