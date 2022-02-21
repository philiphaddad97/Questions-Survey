<?php

namespace App\Http\Requests\Survey;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyRequest extends FormRequest
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
            'id'                        => 'required|exists:surveys,id',
            'title'                     => 'required|string',
            'questions'                 => 'required|array',
            'questions.*.text'          => 'required|string',
            'questions.*.parent_answer' => 'required_if:questions.*.question_type,===,node|string|in:Yes,No',
            'questions.*.parent_id'     => 'required_if:questions.*.question_type,===,node|numeric',
            'questions.*.question_type' => 'required|string|in:root,node',
        ];
    }
}
