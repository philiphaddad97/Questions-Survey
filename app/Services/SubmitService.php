<?php


namespace App\Services;

use App\Models\Question;
use App\Models\Submit;
use App\Models\Survey;
use App\Traits\MailSender;

class SubmitService extends Service
{
    use MailSender;

    public function nextQuestion(int $surveyId, int $id, string $answer)
    {

        $this->data = Question::show($id, $answer)->first();


        if ($this->data) $this->data->status = 'continue';
        else $this->data = ['text' => 'Thanks your for your answers please click submit!🎉', 'status' => 'finished'];
        return $this->data ?? false;
    }


    public function submit($id, array $answers, ?array $notes)
    {
        $submit            = Submit::create(['survey_id' => $id]);

        foreach ($answers as $answer) {
            $submit->answers()->create(['question_id' => $answer['id'], 'answer' => $answer['answer']]);
        }

        if ($notes) {
            foreach ($notes as $item) {
                $submit->notes()->create(['text' => $item]);
            }
        }

        $survey = Survey::where('id', $id)->first();
        if ($survey and $survey->email) {

            $data = [
                'title' => $survey->title,
                'date' => $submit->created_at->diffForHumans(),
                'id' => $survey->id,
            ];
            try{
                self::sendEmail($survey->email, 'survey-submission', $data, 'A NEW SUBMISSION');
            }catch (\Exception $e){

            }
        }

        return true;
    }


    public function show(int $id)
    {
        $this->data = Survey::where('id', $id)->selectIndex()->first();

        return $this->data;
    }

}
