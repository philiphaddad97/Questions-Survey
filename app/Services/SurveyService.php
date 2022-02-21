<?php


namespace App\Services;

use App\Models\Question;
use App\Models\Submit;
use App\Models\Survey;

class SurveyService extends Service
{

    public function index(int $pageSize)
    {
        $this->data = Survey::selectIndex()->orderBy('created_at', 'DESC')->paginate($pageSize);
        foreach ($this->data as $item) {
            $item->actions = '';
            $item->actions .= view('layouts.action-btn', ['route' => route('survey.take', ['id' => $item->id]),
                                                          'tip'   => "Take Survey", 'icon' => 'poll-h']);


            $item->actions .= view('layouts.action-btn', ['route' => route('survey.delete', ['ids' => [$item->id]]),
                                                          'tip'   => "Delete Survey", 'colorClass' => 'danger', 'icon' => 'trash']);

            $item->actions .= view('layouts.action-btn', ['route' => route('survey.view-submissions', ['id' => [$item->id]]),
                                                          'tip'   => "View Submissions", 'colorClass' => 'secondary', 'icon' => 'expand']);

            $item->actions = $item->actions ? $item->actions : 'There is no actions!';
        }

        return $this->data;
    }

    public function store(string $title,?string $email, array $questions)
    {
        $survey = Survey::create(
            [
                'title' => $title,
                'email' => $email
            ]
        );

        $isYes         = true;
        $counter       = 1;
        $check = 1;
        foreach ($questions as $item) {

            $question = null;
            if ($counter == 1) {
                $check++;
                $question = $survey->mainQuestion()->create(
                    [
                        'text'        => $item,
                        'question_no' => $counter,
                        'type'        => 'root',
                    ]);

            } else {
                if ($isYes) $answer = 'Yes';
                else $answer = 'No';
                $isYes = !$isYes;

                $question = Question::where('survey_id', $survey->id)->where('question_no', floor($counter / 2))->first();
                if(!$question)return floor($counter / 2);
                $question->childs()->create(
                    [
                        'text'          => $item,
                        'question_no'   => $counter,
                        'type'          => 'node',
                        'parent_answer' => $answer,
                        'survey_id'     => $survey->id
                    ]
                );

            }

            $counter++;

        }


    }




    public function nextQuestion(int $surveyId, int $id, string $answer)
    {

        $this->data = Question::show($id, $answer)->first();

        if ($this->data) $this->data->status = 'continue';
        else $this->data = ['text' => 'Thanks your for your answers please click submit!🎉', 'status' => 'finished'];
        return $this->data ?? false;
    }



    public function delete(array $ids)
    {
        Survey::whereIn('id', $ids)->delete();

    }


}
