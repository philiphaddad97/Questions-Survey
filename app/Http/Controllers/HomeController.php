<?php

namespace App\Http\Controllers;

use App\Models\Survey;

class HomeController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function dashboard()
    {

        $perSurvey = Survey::join('submits', 'submits.survey_id', '=', 'surveys.id')
                                     ->selectRaw('surveys.title as label, count(submits.id) as data')
                                     ->groupBy('surveys.title')->get();


        $perMonth = Survey::join('submits', 'submits.survey_id', '=', 'surveys.id')
                                    ->selectRaw('monthname(submits.created_at) label, count(submits.id) as data')
                                    ->groupBy('label')->get();


        return view('dashboard', compact('perSurvey', 'perMonth'));
    }
}
