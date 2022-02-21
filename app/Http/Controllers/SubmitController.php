<?php

namespace App\Http\Controllers;

use App\Http\Requests\Survey\QuestionIdRequest;
use App\Http\Requests\Survey\SubmitSurveyRequest;
use App\Http\Requests\Survey\SurveyIdRequest;
use App\Models\Survey;
use App\Services\SubmitService;

class SubmitController extends Controller
{

    public function __construct(SubmitService $service)
    {
        $this->service = $service;
    }

    public function nextQuestion(QuestionIdRequest $request)
    {
        $question = $this->service->nextQuestion($request->survey_id, $request->id, $request->answer);

        if (!$question) {
            return $this->response('failed', ['text' => 'There is something wrong with the sent data!']);
        }

        return $this->response('success', $question);

    }

    public function viewSubmissions(SurveyIdRequest $request)
    {
        $survey = Survey::where('id', $request->id)->first();
        $submits = $survey->submits()->orderBy('created_at', 'desc')->with(['answers'=>function($query){
            $query->join('questions', 'questions.id', '=','answers.question_id')
                  ->select('answers.submit_id','answers.id', 'answers.answer', 'questions.question_no','questions.text');
        }])->get();

        return view('surveys.view-submits', compact('survey', 'submits'));
    }


    public function take(SurveyIdRequest $request)
    {

        $survey = $this->service->show($request->id);

        return view('surveys.take', compact('survey'));
    }

    public function submit(SubmitSurveyRequest $request)
    {

        $submit = $this->service->submit($request->survey_id, $request->answers, $request->notes);


        if ($submit) return $this->response('success');
        else return $this->response('failed');
    }
}
